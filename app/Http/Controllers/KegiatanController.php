<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kehadiran;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF as PDF;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('kegiatan.index',[
        'kegiatans' => Kegiatan::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('kegiatan.create',[
        'title' => 'Tambah Kegitan'
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $ValidatedData = $request->validate([
        'nama_kegiatan' => 'required|max:255',
        'tempat_kegiatan' => 'required',
        'tgl_kegiatan' => 'required|date',
        'tgl_berakhir' => 'date|nullable'
      ]);

      try {
        do {
          $kode = strtoupper(Str::random(6));
          $kegiatan2 = Kegiatan::where('kode_unik', $kode)->first();
        } while ($kegiatan2);
  
        $kegiatan = new Kegiatan();
  
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tempat_kegiatan = $request->tempat_kegiatan;
        $kegiatan->tgl_kegiatan = $request->tgl_kegiatan;
        $kegiatan->tgl_berakhir = $request->tgl_berakhir;
        $kegiatan->kode_unik = $kode;
        $kegiatan->save();  

        return redirect('/kegiatan')->with('success', 'Kegiatan baru berhasil ditambahkan!');
      } catch (\Exception $e) {
        return redirect()->back()->withErrors($e->getMessage())->withInput($request->all());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
      return view('kegiatan.show', compact('kegiatan'));

      // $kegiatans = Participant::first();
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
      return view('kegiatan.edit', [
        'title' => 'Edit Kegiatan',
        'kegiatan' => $kegiatan
      ]);
      // return $kegiatan;
    }

    /**
     * Print PDF QRCODE the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function print(Kegiatan $kegiatan)
    {
      // set style for barcode
      $style = [
        "border" => 2,
        "vpadding" => "auto",
        "hpadding" => 'auto',
        "fgcolor" => array(0,0,0),
        "bgcolor" => false, //array(255,255,255)
        "module_width" => 1, // width of a single module in points
        "module_height" => 1 // height of a single module in points
        ];

      PDF::SetFont('helvetica', '', 10);

      PDF::SetTitle($kegiatan->nama_kegiatan);
      PDF::AddPage();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

      PDF::SetFont('helvetica', 'B', 14);
      PDF::Cell(0, 10, $kegiatan->nama_kegiatan . ' - QR CODE - ' . $kegiatan->kode_unik, 0, 1, 'C');
      PDF::SetFont('helvetica', '', 12);
      PDF::Cell(0, 10, 'Silakan scan qrcode tersebut untuk registrasi kehadiran', 0, 1, 'C');

      PDF::write2DBarcode(url('register/' . $kegiatan->id_kegiatan . '/kehadiran'), 'QRCODE,H', 55, 50, 100, 100, $style, 'N');
      
      PDF::Output($kegiatan->nama_kegiatan . ' - qrcode.pdf');
      // return $kegiatan;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
      $ValidatedData = $request->validate([
        'nama_kegiatan' => 'required|max:255',
        'tempat_kegiatan' => 'required',
        'tgl_kegiatan' => 'required|date',
        'tgl_berakhir' => 'date|nullable'
      ]);

      Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan) 
      -> update($ValidatedData);

      return redirect('/kegiatan')->with('success', 'Kegiatan berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
      Kegiatan::destroy($kegiatan->id_kegiatan);
      return redirect('/kegiatan')->with('success', 'Kegiatan berhasil dihapus!');
    }



    public function kehadiran(Kegiatan $kegiatan, Participant $participant)
    {
      return view('peserta.register', compact('kegiatan'));
    }

    public function cekKehadiran(Participant $participant, Request $request, Kegiatan $kegiatan)
    {
      $request->validate([
        'nik' => 'required|digits:16'
      ]);

      if($participant=Participant::where('nik', request('nik'))->first()){
        return view('kehadiran.show', compact('participant', 'kegiatan'));
        // return redirect()->route('kehadiran.show', $kegiatan->id_kegiatan)->with(compact('participant'));
      }

      // return view('kehadiran.create', compact('kegiatan'));
      return redirect()->route('kehadiran.biodata', $kegiatan->id_kegiatan);
    }

    public function ttdPeserta(Kegiatan $kegiatan, Participant $participant)
    {
      return view('kehadiran.ttd')->with(compact('kegiatan', 'participant'));
    }

    public function signPeserta(Kegiatan $kegiatan, Participant $participant, Request $request)
    {
      
      // dd($request->ttd_online->storeAs('images', 'filename.jpg'));

      // $kegiatan->participants()->attach([$participant->id]);

      // $folderPath = storage_path('Signatures\ '); // create signatures folder in public directory
      // $image_parts = explode(";base64,", $request->ttd_online);
      // $image_type_aux = explode("image/", $image_parts[0]);
      // $image_type = $image_type_aux[1];
      // $image_base64 = base64_decode($image_parts[1]);
      $strRnd = uniqid() . '.jpg';
      // $file = $folderPath . $strRnd . '.' . $image_type;
      // file_put_contents($file, $image_base64);

      $request->ttd_online->storeAs('images', $strRnd);

      // // Save in your data in database here.
      Kehadiran::create([
          'sign-img' => $strRnd,
          'kegiatan_id_kegiatan' => $kegiatan->id_kegiatan,
          'participant_id' => $participant->id
      ]);

      return redirect()->route('kehadiran', $kegiatan->id_kegiatan)->with('success', 'Kehadiran telah direkam');
    }
}
