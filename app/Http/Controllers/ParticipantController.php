<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use App\Models\Kegiatan;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('peserta.index', [
        'participants' => Participant::all()
      ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('peserta.create', [
        'title' => 'Biodata'
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParticipantRequest $request)
    {
      $validatedData = $request->validate([
        'nama' => 'required',
        'nik' => 'required|unique:participants',
        'tempat_lhr' => 'required',
        'tanggal_lhr' => 'required|date',
        'gender' => 'required',
        'golongan' => 'required',
        'jabatan' => 'required',
        'instansi' => 'required',
        'alamat_instansi' => 'required',
        'no_hp' => 'required',
        'alamat_rumah' => 'required',
        'email' => 'required|email:dns|unique:participants',
        'no_npwp' => 'required',
        'no_rek' => 'required',
        'nama_bank' => 'required'
      ]);

      Participant::create($validatedData);

      return redirect('/participant')->with('success', 'Biodata peserta berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
      return view('peserta.show',[
        'participant' => $participant
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
      return view('peserta.edit',[
        'title' => 'Boidata',
        'participant' => $participant
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParticipantRequest  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParticipantRequest $request, Participant $participant)
    {
      $validatedData = $request->validate([
        'nama' => 'required',
        'nik' => 'required|unique:participants',
        'tempat_lhr' => 'required',
        'tanggal_lhr' => 'required|date',
        'gender' => 'required',
        'golongan' => 'required',
        'jabatan' => 'required',
        'instansi' => 'required',
        'alamat_instansi' => 'required',
        'no_hp' => 'required',
        'alamat_rumah' => 'required',
        'email' => 'required|email:dns|unique:participants',
        'no_npwp' => 'required',
        'no_rek' => 'required',
        'nama_bank' => 'required'
      ]);

      Participant::where('id', $participant->id)->update($validatedData);

      return redirect('/participant')->with('success', 'Biodata peserta berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
      Participant::destroy($participant->id);
      return redirect('/participant')->with('success', 'Peserta berhasil dihapus!');
    }



    public function tampilPeserta(Kegiatan $kegiatan)
    {
      return view('kehadiran.create', compact('kegiatan')); 
    }

    public function daftarPeserta(StoreParticipantRequest $request, Participant $participant, Kegiatan $kegiatan)
    {

      $validatedData = $request->validate([
        'nama' => 'required',
        'nik' => 'required|unique:participants',
        'tempat_lhr' => 'required',
        'tanggal_lhr' => 'required|date',
        'gender' => 'required',
        'golongan' => 'required',
        'jabatan' => 'required',
        'instansi' => 'required',
        'alamat_instansi' => 'required',
        'no_hp' => 'required',
        'alamat_rumah' => 'required',
        'email' => 'required|email:dns|unique:participants',
        'no_npwp' => 'required',
        'no_rek' => 'required',
        'nama_bank' => 'required'
      ]);

      $createdParticipant = Participant::create($validatedData);

      return redirect()->route('kehadiran.ttd', [$kegiatan->id_kegiatan, $createdParticipant->nik]);
    }

    public function detailPeserta(Participant $participant, Kegiatan $kegiatan)
    {
      return view('kehadiran.show', compact('participant', 'kegiatan'));
    }

}
