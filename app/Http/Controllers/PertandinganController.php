<?php

namespace App\Http\Controllers;

use App\Models\Klup;
use App\Models\Pertandingan;
use App\Models\PertandinganList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertandingan = Pertandingan::orderBy('nama', 'asc')->paginate(5);
        return view('pertandingan', compact('pertandingan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pertandingan-add', [
            'id' => '',
            'nama' => '',
        ]);
    }


    public function list(Request $request)
    {

        $list = DB::table('list_pertandiangans')
            ->join('klubs as b', 'b.id', '=', 'list_pertandiangans.klub_a')
            ->join('klubs as c', 'c.id', '=', 'list_pertandiangans.klub_b')
            ->where('list_pertandiangans.babak', $request->babak)
            ->where('list_pertandiangans.pertandingan_id', $request->id)
            ->select('list_pertandiangans.pertandingan_id', 'list_pertandiangans.point', 'list_pertandiangans.id', 'c.name as namab', 'c.id as idb', 'b.name as namaa', 'b.id as ida', 'list_pertandiangans.score_a', 'list_pertandiangans.score_b')
            ->get();

        // $list = PertandinganList::where('pertandingan_id', $request->id)->get();
        return view('pertandingan-list', ['pertandinganid' => $request->id, 'babak' => $request->babak, 'list' => $list]);
    }


    public function klasemen(Request $request)
    {

        $sql =  Klup::all();
        $gm[] = '';
        $gk[] = '';
        $pn[] = '';
        $gm1 = 0;
        $gm2 = 0;
        foreach ($sql as $key => $value) {

            $sqla = PertandinganList::where('klub_a', $value->id)->get();
            if ($sqla) {
                foreach ($sqla as $da) {
                    if ($da->menang == $value->id) {
                        $po1 = 3;
                        $n1 = 'Menang';
                        $gm1 = $da->score_a;

                        $pn1 = 3;
                        $goalM[$value->name][] = $gm1;
                    } elseif ($da->menang == '-') {
                        $po1 = 1;
                        $n1 = 'Seri';

                        $pn1 =  0;
                    } else {
                        $po1 = 0;
                        $n1 = 'Kalah';

                        $gk1 = $da->score_b;
                        $pn1 = 0;

                        $goalK[$value->name][] = $gk1;
                    }
                    $na[$value->name][] = [$po1, $n1];
                    $point[$value->name][] = $pn1;
                }
            }

            $sqlb = PertandinganList::where('klub_b', $value->id)->get();
            if ($sqlb) {
                foreach ($sqlb as $db) {
                    if ($db->menang == $value->id) {
                        $po2 = 3;
                        $n2 = 'Menang';
                        $gm2 = $db->score_b;

                        $pn2 = 3;
                        $goalM[$value->name][] = $gm2;
                    } elseif ($db->menang == '-') {
                        $po2 = 1;
                        $n2 = 'Seri';


                        $pn2 =  0;
                    } else {
                        $po2 = 0;
                        $n2 = 'Kalah';

                        $gk2 = $db->score_a;
                        $pn2 = 0;
                        $goalK[$value->name][] = $gk2;
                    }
                    $na[$value->name][] = [$po2, $n2];
                    $point[$value->name][] = $pn2;

                    // $gm[$value->name]['GM'] =                        $gm;
                    // $gk[$value->name]['GK'] =
                    //     $gk;
                    // $pn[$value->name]['PN'] =
                    //     $pn;
                }
            }
            # code...
        }

        // for ($i = 0; $i < count($nb); $i++) {
        //     $nnn[] = $na[$i] + $nb[$i];
        // }

        foreach ($point as $np => $vp) {
            $pot[$np][] = array_sum($vp);
        }

        foreach ($goalM as $ng => $vg) {
            $galm[$ng][] = array_sum($vg);
        }

        foreach ($goalK as $nk => $vk) {
            $galk[$nk][] = array_sum($vk);
        }
        arsort($pot);
        // dd($pot);
        // dd($na);

        // $list = DB::table('list_pertandiangans')
        //     ->join('klubs as b', 'b.id', '=', 'list_pertandiangans.klub_a')
        //     ->join('klubs as c', 'c.id', '=', 'list_pertandiangans.klub_b')
        //     ->where('list_pertandiangans.babak', $request->babak)
        //     ->where('list_pertandiangans.pertandingan_id', $request->id)
        //     ->select('list_pertandiangans.pertandingan_id', 'list_pertandiangans.point', 'list_pertandiangans.id', 'c.name as namab', 'c.id as idb', 'b.name as namaa', 'b.id as ida', 'list_pertandiangans.score_a', 'list_pertandiangans.score_b')
        //     ->get();

        // // $list = PertandinganList::where('pertandingan_id', $request->id)->get();
        return view('pertandingan-list-klasement', ['klasement' => $na, 'gm' => $galm, 'gk' => $galk, 'point' => $pot]);
    }

    public function listAdd(Request $request)
    {
        $klub = Klup::all();
        return view('pertandingan-list-add', ['pertandinganid' => $request->id, 'babak' => $request->babak, 'klub' => $klub]);
    }

    public function storeList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'klub_a' => ['required'],
            'klub_b' => ['required'],
            'babak' => ['required'],
        ]);


        if ($validator->fails()) {
            return redirect('pertandingan-list-add')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->klub_a == $request->klub_b) {
            return redirect()->route('pertandingan-list-add', ['id' => $request->pertandinganid, 'babak' => $request->babak])->with(['errors' => 'Tidak boleh dengan klub yang sama']);
        }

        $dper =  PertandinganList::where(['klub_a' => $request->klub_a, 'klub_b' => $request->klub_b])->first();
        if ($dper) {
            return redirect()->route('pertandingan-list-add', ['id' => $request->pertandinganid, 'babak' => $request->babak])->with(['errors' => 'Pertandigan sudah di input']);
        }

        PertandinganList::create([
            'pertandingan_id' => $request->pertandinganid,
            'klub_a' => $request->klub_a,
            'klub_b' => $request->klub_b,
            'babak' => $request->babak,
            'menang' => '-',
            'point' => 0,
            'score_a' => 0,
            'score_b' => 0,
        ]);

        return redirect()->route('pertandingan-list', ['id' => $request->pertandinganid, 'babak' => $request->babak])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function storePointList(Request $request)
    {

        foreach ($request->id_p as $ni) {

            if ($request->post('klub_a_' . $ni) == $request->post('klub_b_' . $ni)) {
                $nilai[$ni] = [$request->post('klub_a_' . $ni), $request->post('klub_b_' . $ni), '-', '1'];
            } elseif ($request->post('klub_a_' . $ni) >= $request->post('klub_b_' . $ni)) {
                $nilai[$ni] = [$request->post('klub_a_' . $ni), $request->post('klub_b_' . $ni), $request->post('id_klub_a_' . $ni), 3];
            } elseif ($request->post('klub_a_' . $ni) <= $request->post('klub_b_' . $ni)) {
                $nilai[$ni] = [$request->post('klub_a_' . $ni), $request->post('klub_b_' . $ni), $request->post('id_klub_b_' . $ni), 3];
            }

            PertandinganList::where('id', $ni)
                ->update(['score_a' => $nilai[$ni][0], 'score_b' => $nilai[$ni][1], 'menang' => $nilai[$ni][2], 'point' => $nilai[$ni][3]]);
        }

        // dd($nilai[1][2]);


        // $validator = Validator::make($request->all(), [
        //     'klub_a' => ['required'],
        //     'klub_b' => ['required'],
        // ]);


        // if ($validator->fails()) {
        //     return redirect('pertandingan-list-add')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // if ($request->klub_a == $request->klub_b) {
        //     return redirect()->route('pertandingan-list-add')->with(['errors' => 'Tidak boleh dengan klub yang sama']);
        // }

        // PertandinganList::updateOrCreate([
        //     'id' => $request->id
        // ], [
        //     'pertandingan_id' => $request->pertandinganid,
        //     'klub_a' => $request->klub_a,
        //     'klub_b' => $request->klub_b,
        //     'menang' => 0,
        //     'point' => 0,
        // ]);

        return redirect()->route('pertandingan-list', ['id' => $request->pertandinganid, 'babak' => $request->babak])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('pertandingan')
                ->withErrors($validator)
                ->withInput();
        }


        Pertandingan::updateOrCreate([
            'id' => $request->id
        ], [
            'nama' => $request->nama,
        ]);

        return redirect()->route('pertandingan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertandingan $pertandingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertandingan $pertandingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertandingan $pertandingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertandingan $pertandingan)
    {
        //
    }
}
