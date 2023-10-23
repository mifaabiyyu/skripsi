<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tipografi;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use jarowinkler\JaroWinkler\JaroWinklerDistance;
use Sastrawi\Tokenizer\TokenizerFactory;
use Smalot\PdfParser\Parser;
use Symfony\Component\HttpFoundation\Response;


class TipografiCheckController extends Controller
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
    public function index()
    {
        return view('superadmin.backend.deteksisalahketik.index');
    }

    public function indextext()
    {
        return view('superadmin.backend.deteksisalahketik.indexaa');
    }

    public function PdftoText()
    {
        // The relative or absolute path to the PDF file
        $pdfFilePath = $this->get('kernel')->getRootDir() . '/../web/example.pdf';

        // Create an instance of the PDFParser
        $PDFParser = new Parser();

        // Create an instance of the PDF with the parseFile method of the parser
        // this method expects as first argument the path to the PDF file
        $pdf = $PDFParser->parseFile($pdfFilePath);

        // Extract ALL text with the getText method
        $text = $pdf->getText();

        // Send the text as response in the controller
        return new Response($text);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pdftext(Request $request)
    {
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
        $hpstanda = preg_replace("/[^a-zA-Z]/", " ", $text);
        //menjadikan teks huruf kecil
        $haha = strtolower($hpstanda);
        return view('superadmin.backend.deteksisalahketik.indexaa', compact('haha'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jarowinkler(Request $request)
    {
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
                'color' => $maxValue == 1 ? "font-black" : "font-red",
                'word' => $words[$i]
            ];
        }
        return view('superadmin.backend.deteksisalahketik.indexhasil', compact('results'));
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
