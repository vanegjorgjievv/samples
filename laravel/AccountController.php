<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Account_group;
use Session;



class AccountController extends Controller {

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('accounts');    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    if ($request->opening_value == '') $request['opening_value'] = '0';
    if ($request->budget_value == '') $request['budget_value'] = '0';

    $this->validate($request, [
        'account_period_id' => 'required|numeric',
        'account_group_id' => 'required|numeric',
        'number' => 'digits_between:1,6',
        'name' => 'required|max:255',
        'opening_value' => 'numeric|max:9999999999999999|min:-9999999999999999',
        'budget_value' => 'numeric|max:9999999999999999|min:-9999999999999999',
    ]);

    Account::create($request->all());
    return back()->with('success','created successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */



public function addAccount(Request $request)
{
    $new_account = Account::create($request->all());

    $response = array(
        'status' => 'success',
        'new_id' => 'a'.$new_account->id,
        'opening_value' => number_format($request['opening_value'], 2, ".", "'"),
        'budget_value' => number_format($request['budget_value'], 2, ".", "'"),
    );

    return \Response::json( $response );
}

public function addGroup(Request $request)
{
    $new_group = Account_group::create($request->all());

    $response = array(
        'status' => 'success',
        'new_id' => 'g'.$new_group->id,
    );

    return \Response::json( $response );
}


public function updateAccount(Request $request, $id)
{
    $account = Account::find($id);

    $edit_data=$request['fdata'];
    $edit_field=$request['edit'];
    if($edit_field =="opening_value" || $edit_field =="budget_value"){
        $edit_data = str_replace("'", "", $edit_data);
        if(is_numeric($edit_data)){
            $account->$edit_field = $edit_data;
            $account->save();
            $edit_data_current = number_format($account->sum(), 2, ".", "'");
            $edit_data =number_format($edit_data, 2, ".", "'");

            $response = array(
                'status' => 'success',
                'msg' => 'Value changed successfully',
                'fdata' => $edit_data,
                'current_value' => $edit_data_current,
            );
        }
        else{
            $response = array(
                'status' => 'error',
                'msg' => 'Error editing setting',
                'fdata' => '',
            );
        }
    }
    if($edit_field =="number" || $edit_field =="name") {
        $account->$edit_field = $edit_data;
        $account->save();

        $response = array(
            'status' => 'success',
            'msg' => 'Value changed successfully',
            'fdata' => $edit_data,
            'current_value' => '',
        );
    }

    return \Response::json( $response );
}

public function updateGroup(Request $request, $id)
{
    $group = Account_group::find($id);

    $edit_data=$request['fdata'];
    $edit_field=$request['edit'];

    if( $edit_field=="group_number" && is_numeric($edit_data)) {
        $group->$edit_field = $edit_data;
        $group->save();
        $response = array(
            'status' => 'success',
            'msg' => 'Value changed successfully',
            'fdata' => $edit_data,
            'current_value' => '',
        );
    }else{
        $response = array(
            'status' => 'error',
            'msg' => 'Error editing setting',
            'num' => $edit_data,
        );
    }

    if( $edit_field=="name") {
        $group->$edit_field = $edit_data;
        $group->save();

        $response = array(
            'status' => 'success',
            'msg' => 'Value changed successfully',
            'fdata' => $edit_data,
            'current_value' => '',
        );
    }
    return \Response::json( $response );
}

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

}

?>
