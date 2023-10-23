<?php

namespace App\Http\Controllers;

use App\Models\Anggota\Departemen;
use App\Models\contactus\Kritiksaran;
use App\Models\contactus\Pendaftaran;
use App\Models\Tipografi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use jarowinkler\JaroWinkler\JaroWinklerDistance;
use Smalot\PdfParser\Parser;

class ContactusController extends Controller
{
    public function __construct()
    {
        ini_set('max_execution_time', 1000);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendaftaran()
    {
        $dep = Departemen::all();
        return view('frontend.pendaftaran.pendaftaran', compact('dep'));
    }

    public function list()
    {
        $list = Pendaftaran::all();
        $dep = Departemen::all();
        return view('frontend.pendaftaran.list', compact('dep', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function pdftext(Request $request)
    {
        $dep = Departemen::all();
        //Validasi Data Input
        $request->validate([
            'file' => 'required',
        ]);
        $upl = $request->file;
        $nmfile = $upl->getClientOriginalName() . "." . $upl->getClientOriginalExtension();
        //Masukkan Data Input FIle Kedalam Database
        $proposal = new Tipografi;
        $proposal->file = $nmfile;
        $upl->move(public_path() . '/proposal/tipografi', $nmfile);
        $proposal->save();
        //Memanggil File yang telah Diupload Kedalam variable $pdfFilePath
        $pdfFilePath = public_path('proposal/tipografi/')  . $nmfile;
        //Memanggil Class Parser
        $PDFParser = new Parser();
        $pdf = $PDFParser->parseFile($pdfFilePath);
        //Mengambil teks dalam PDF
        $text = $pdf->getText();
        //Menghapus simbol dan angka dalam teks
        $hpstanda = preg_replace("/[^a-zA-Z0-9]/", " ", $text);
        //menjadikan teks huruf kecil
        $haha = strtolower($hpstanda);
        return view('frontend.pendaftaran.pdf-text', compact('haha', 'dep'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jarowinkler(Request $request)
    {
        $dep = Departemen::all();
        //Memanggil Class JaroWinklerDistance
        $jw = new JaroWinklerDistance;
        $kataindo = File::get(public_path('jaro-winkler/kataindo.lst'));
        $textproposal = $request->hasiltext;
        //Proses memecah kalimat menjadi kata
        $words = explode(" ", $textproposal);
        $katabaku = explode('|', $kataindo);

        $results = [];
        //Perulangan untuk melakukan penghitungan algoritma Setiap kata dalam inputan
        for ($i = 0; $i < sizeof($words); $i++) {
            $maxValue = 0;
            for ($j = 0; $j < sizeof($katabaku); $j++) {
                $result = $jw->compare($words[$i], $katabaku[$j]); //penghitungan kata input dengan data uji
                if ($result == 1) {
                    $maxValue = 1; //jika kata telah bernilai 1 maka lanjut ke kata selanjutnya
                    break;
                }
                if ($result > $maxValue) $maxValue = $result;
            }
            $results[$words[$i]] = [
                'value' => $maxValue,
                'color' => $maxValue == 1 ? "color:black" : "color:red",
                'word' => $words[$i]
            ];
        }
        return view('frontend.pendaftaran.list', compact('results', 'dep'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_pendaftaran(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'npm' => 'required|unique:pendaftaran_hima|numeric',
            'visi' => 'required',
            'misi' => 'required',
            'departemen1' => 'required',
            'departemen2' => 'required',
            'alasan_departemen' => 'required',
            'alasan_hima' => 'required',
            'photo' => 'required|file|size:200',
        ];

        $messages = [
            'nama.required'             => 'Nama wajib diisi.',
            'npm.required'              => 'NPM wajib diisi.',
            'npm.unique'                => 'NPM sudah terdaftar.',
            'npm.numeric'                => 'NPM harus angka.',
            'visi.required'             => 'Visi wajib diisi.',
            'misi.required'             => 'Misi wajib diisi.',
            'departemen1.required'      => 'Departemen 1 wajib diisi.',
            'departemen2.required'      => 'Departemen 2 wajib diisi.',
            'alasan_departemen.required' => 'Alasan Departemen wajib diisi.',
            'alasan_hima.required'      => 'Alasan Hima wajib diisi.',
            'photo.required'            => 'Foto wajib diisi.',
            'photo.size'                => 'Ukuran tidak boleh melebihi 200kb.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $upl = $request->photo;
        $nmfile = time() . rand(100, 999) . "." . $upl->getClientOriginalExtension();

        $pendaftaran = new Pendaftaran;
        $pendaftaran->nama = $request->nama;
        $pendaftaran->npm = $request->npm;
        $pendaftaran->visi = $request->visi;
        $pendaftaran->misi = $request->misi;
        $pendaftaran->departemen1 = $request->departemen1;
        $pendaftaran->departemen2 = $request->departemen2;
        $pendaftaran->alasan_departemen = $request->alasan_departemen;
        $pendaftaran->alasan_hima = $request->alasan_hima;
        $pendaftaran->photo = $nmfile;
        $pendaftaran->status = "1";

        $upl->move(public_path() . '/img/pengurus/calon_pengurus', $nmfile);
        $pendaftaran->save();

        return back()->withSuccess('Pendaftaran Berhasil !!');
    }

    public function store_kritiksaran(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required|numeric',
        ]);

        $kritiksaran = new Kritiksaran;
        $kritiksaran->nama = $request->nama;
        $kritiksaran->npm = $request->npm;
        $kritiksaran->kritik_saran = $request->kritik_saran;

        $kritiksaran->save();
        return back()->withSuccess('Kritik & Saran Berhasil di Submit !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
