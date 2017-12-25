@extends('layouts.app')

@section('content')
  <div class="container accounts_container">
    <div class="col-sm-offset-1 col-sm-10">
      <div id="status" ></div>
      <div class="panel panel-default">
        <div class="panel-heading">
            Accounts  <a href="#" class="refresh" style="display:none; float:right"  onClick="window.location.reload()">Refresh Groups</a>
        </div>
        <div class="panel-body">
          <table class="table table-striped account_period-table accounts_table">
            <thead>
              <th>id</th>
              <th>parent</th>
              <th>number</th>
              <th>name</th>
              <th>opening</th>
              <th>current</th>
              <th>budget</th>
              <th>action</th>
            </thead>

              <tr id="new_account_row" style="display:none;">
                  <td><a href="#" onclick="return false;" class="new_account_row_hide clickable">X</a></td>
                  <td>{!! Form::text('account_group_id','', [ 'id' => 'account_group_id', 'class' => 'form_readonly','readonly' => 'true', 'style' => 'width:50px']) !!}</td>
                  <td>{!! Form::text('number', '', [ 'id' => 'number', 'style' => 'width:90px']) !!}</td>
                  <td>{!! Form::text('name','', [ 'id' => 'name', 'style' => 'width:180px']) !!}</td>
                  <td>{!! Form::text('opening_value','', [ 'id' => 'opening_value', 'style' => 'width:80px']) !!}</td>
                  <td></td>
                  <td>{!! Form::text('budget_value','', [ 'id' => 'budget_value', 'style' => 'width:80px']) !!}</td>
                  <td><a href="#" onclick="return false;" class="add_account clickable">Add Account</a></td>
              </tr>
              <tr id="clone_account_row" style="display:none;">
                  <td>1</td>
                  <td>2</td>
                  <td class="editable acc" contenteditable="true" id="number">3</td>
                  <td class="editable acc" contenteditable="true" id="name" >4</td>
                  <td class="editable acc" contenteditable="true" id="opening_value" >5</td>
                  <td id="current_value"  >6</td>
                  <td class="editable acc" contenteditable="true" id="budget_value" >7</td>
                  <td></td>
              </tr>

              <tr id="new_group_row" style="display:none;">
                  <td><a href="#" onclick="return false;" class="new_row_hide clickable">X</a></td>
                  <td>{!! Form::text('parent_id','', [ 'id' => 'parent_id', 'class' => 'form_readonly','readonly' => 'true', 'style' => 'width:50px']) !!}</td>
                  <td>{!! Form::text('number', '', [ 'id' => 'number', 'style' => 'width:90px']) !!}</td>
                  <td>{!! Form::text('name','', [ 'id' => 'name', 'style' => 'width:180px']) !!}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><a href="#" onclick="return false;" class="add_group clickable">Add Group</a></td>
              </tr>
              <tr id="clone_row" style="display:none;">
                  <td>1</td>
                  <td>2</td>
                  <td class="editable group" contenteditable="true" id="group_number">3</td>
                  <td class="editable group" contenteditable="true" id="name"  >4</td>
                  <td>5</td>
                  <td>6</td>
                  <td>7</td>
                  <td><a href="#" onclick="return false;" class="new_group clickable">+Group</a> / <a href="#" onclick="return false;" class="new_acc clickable">+Account</a></td>
              </tr>

	  @foreach ($account_period_select->account_groups->where('parent_group_id','=','') as $account_group)
	    <tr id="g{!! $account_group->id !!}" >
	      <td><h4>{!! $account_group->id !!}</h4></td>
	      <td><h4>{!! $account_group->parent_group_id !!}</h4></td>
	      <td><h4>{!! $account_group->group_number !!}</h4></td>
	      <td><h4>{!! $account_group->name !!}</h4></td>
              <td><h4>{!! number_format($account_group->sum_opening(0), 2, ".", "'") !!}</h4></td>
              <td><h4>{!! number_format($account_group->sum(0), 2, ".", "'") !!}</h4></td>
              <td><h4>{!! number_format($account_group->sum_budget(0), 2, ".", "'") !!}</h4></td>
            <td id="test" ><a href="#" onclick="return false;" class="new_group clickable">+Group</a> / <a href="#" onclick="return false;" class="new_acc clickable">+Account</a></td>
            </tr>
              @foreach ($account_group->accounts as $account)
              <tr id="a{!! $account->id !!}" >
                <td>{!! $account->id !!}</td>
                <td>{!! $account->account_group_id !!}</td>
                <td class="editable acc" contenteditable="true" id="number" >{!! $account->number !!}</td>
                <td class="editable acc" contenteditable="true" id="name" >{!! $account->name !!}</td>
                <td class="editable acc" contenteditable="true" id="opening_value" >{!! $account->opening_value !!}</b></td>
                <td id="current_value" >{!! number_format($account->sum(), 2, ".", "'") !!}</td>
                <td class="editable acc" contenteditable="true" id="budget_value" >{!! $account->budget_value !!}</b></td>
                <td></td>
              </tr>
              @endforeach
              @include('account-row', ['account_group_parent' => $account_group])
            <tr>
              <td colspan=8>&nbsp;</td>
            </tr>
	  @endforeach
          </table>
        </div>
      </div>

    </div>
  </div>

<script>

$(function(){
    {{-- ADD NEW ACCOUNT BELOW CURRENT GROUP --}}

    $('.new_acc').click(function(){
        var parent_id=$(this).parent().parent().attr('id');
        parent_id = parent_id.substr(1);
        $(this).parent().parent().after($( '#new_account_row' ));
        $('#new_account_row').show();
        $('#new_account_row #account_group_id').val(parent_id);
    });

    $( '.new_account_row_hide' ).click(function(){
        $( '#new_account_row' ).hide();
    });

    $('.add_account').click(function(){
        var error = false;
        var account_group_id= $( '#new_account_row #account_group_id' ).val();
        var number=$( '#new_account_row #number' ).val();
        var name=$( '#new_account_row #name' ).val();
        var opening_value=$( '#new_account_row #opening_value' ).val();
        var budget_value=$( '#new_account_row #budget_value' ).val();

        $( '#new_account_row input' ).css('border',' 1px solid grey');

        if(isNaN(number) || number ==''){
            $( '#new_account_row #number' ).css('border',' 1px solid red');
            error = true;
        }
        if(name ==''){
            $( '#new_account_row #name' ).css('border',' 1px solid red');
            error = true;
        }
        if(isNaN(opening_value) || opening_value ==''){
            $( '#new_account_row #opening_value' ).css('border',' 1px solid red');
            error = true;
        }
        if(isNaN(budget_value) || budget_value ==''){
            $( '#new_account_row #budget_value' ).css('border',' 1px solid red');
            error = true;
        }
        if(!error) {
            $.ajax({
                url: 'addaccount',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    account_group_id: account_group_id,
                    number: number,
                    name: name,
                    account_period_id: '{{Session::get('account_period_id')}}',
                    opening_value:opening_value,
                    budget_value:budget_value
                },
                success: function (data) {
                    if (data != '') {
                        if (data['status'] == 'success') {
                            $('.refresh').show();
                            var clone2= $("#clone_account_row").clone(true).attr('id', data['new_id']);

                            $( '#new_account_row' ).after(clone2);
                            $( '#new_account_row' ).find('input').val('');
                            $( '#new_account_row' ).hide();
                            var  new_id=data['new_id'];
                            $( '#'+new_id).show();
                            $( '#'+new_id).css('background', 'lightgreen').delay(2000).queue(function (next) {
                                $(this).css('background', 'none');
                            });

                            $( '#'+new_id+' td:first-child' ).html(new_id.substr(1));
                            $( '#'+new_id+' td:nth-child(2)' ).html(account_group_id);
                            $( '#'+new_id+' td:nth-child(3)' ).html(number);
                            $( '#'+new_id+' td:nth-child(4)' ).html(name);
                            $( '#'+new_id+' td:nth-child(5)' ).html(data['opening_value']);
                            $( '#'+new_id+' td:nth-child(6)' ).html(data['opening_value']);
                            $( '#'+new_id+' td:nth-child(7)' ).html(data['budget_value']);

                        } else {
                            $( '#new_account_row').css('background', '#f26d6d').delay(1000).queue(function (next) {
                                $(this).css('background', 'none');
                            });
                        }

                    } else {
                        $( '#new_account_row').css('background', '#f26d6d').delay(1000).queue(function (next) {
                            $(this).css('background', 'none');
                        });
                    }
                }
            });
        }
    });

    {{-- ADD NEW GROUP BELOW CURRENT GROUP --}}

    $('.new_group').click(function(){
        var parent_id=$(this).parent().parent().attr('id');
        parent_id = parent_id.substr(1);
        $(this).parent().parent().after($( '#new_group_row' ));
        $( '#new_group_row' ).show();
        $('#new_group_row #parent_id').val(parent_id);
    });

    $( '.new_row_hide' ).click(function(){
        $( '#new_group_row' ).hide();
    });

    $('.add_group').click(function(){
        var error = false;
        var parent_id= $( '#new_group_row #parent_id' ).val();
        var number=$( '#new_group_row #number' ).val();
        var name=$( '#new_group_row #name' ).val();
        $( '#new_group_row input' ).css('border',' 1px solid grey');

        if(isNaN(number) || number ==''){
            $( '#new_group_row #number' ).css('border',' 1px solid red');
            error = true;
        }
        if(name ==''){
            $( '#new_group_row #name' ).css('border',' 1px solid red');
            error = true;
        }
        if(!error) {
            $.ajax({
                url: 'addgroup',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    parent_group_id: parent_id,
                    group_number: number,
                    name: name,
                    account_period_id: '{{Session::get('account_period_id')}}'
                },
                success: function (data) {
                    if (data != '') {
                        if (data['status'] == 'success') {
                            $('.refresh').show();
                            var clone1= $("#clone_row").clone(true).attr('id', data['new_id']);
                            $( '#new_group_row' ).after(clone1);
                            $( '#new_group_row' ).find('input').val('');
                            $( '#new_group_row' ).hide();
                            var  new_id=data['new_id'];
                            $( '#'+new_id).show();
                            $( '#'+new_id).css('background', 'lightgreen').delay(2000).queue(function (next) {
                                $(this).css('background', 'none');
                            });
                            $( '#'+new_id+' td:first-child' ).html('<b>'+new_id.substr(1)+'</b>');
                            $( '#'+new_id+' td:nth-child(2)' ).html('<b>'+parent_id+'</b>');
                            $( '#'+new_id+' td:nth-child(3)' ).html('<b>'+number+'</b>');
                            $( '#'+new_id+' td:nth-child(4)' ).html('<b>'+name+'</b>');
                            $( '#'+new_id+' td:nth-child(5)' ).html('<b>0.00</b>');
                            $( '#'+new_id+' td:nth-child(6)' ).html('<b>0.00</b>');
                            $( '#'+new_id+' td:nth-child(7)' ).html('<b>0.00</b>');
                        } else {
                            $( '#new_group_row').css('background', '#f26d6d').delay(1000).queue(function (next) {
                                $(this).css('background', 'none');
                            });
                        }
                    } else {
                        $( '#new_group_row').css('background', '#f26d6d').delay(1000).queue(function (next) {
                            $(this).css('background', 'none');
                        });
                    }
                }
            });
        }
    });

    {{-- EDIT SINGLE ACCOUNT OR GROUP FIELD --}}

    $(".group, .acc").click(function(){
        $(this).addClass('edited');
        var val1= $(this).text();

        $(this).blur(function(){
            $(this).removeClass('edited');
            if($(this).text() != val1) {

                var id = $(this).parent("tr").attr("id");
                id = id.substr(1);
                $obj = $(this);
                var url="";
                if($(this).hasClass('group')){
                    url = 'updategroup/';
                }else{
                    url = 'updateaccount/';
                }
                $.ajax({
                    url: url + id,
                    type: 'POST',
                    data: {
                        _method: "POST",
                        _token: "{{ csrf_token() }}",
                        fdata: $(this).text(),
                        edit: $(this).attr('id'),
                    },
                    success: function (data) {
                        if (data != '') {
                            if (data['status'] == 'success') {

                                $obj.text(data['fdata']);
                                if($obj.hasClass('group') ){
                                    $obj.css('font-weight','bold');
                                };
                                $obj.css('background', 'none');
                                $obj.css('background', 'lightgreen').delay(1000).queue(function (next) {
                                    $(this).css('background', 'none');
                                    next();
                                });
                                if (data['current_value'] != '') {
                                    $obj.parent().children('#current_value').text(data['current_value']);
                                }
                                if ( url == 'updateaccount/') {
                                    $('.refresh').show();
                                }

                                // $("#status").text('Edit Successful');
                                // $("#status").show();
                                // $("#status").delay(3000).fadeOut();
                            } else {
                                $obj.css('background', '#f26d6d');
                            }

                        } else {
                            $obj.css('background', '#f26d6d');
                        }
                    }
                });
            }
        });
    });

    $('.acc, .group').keypress(function(e) {
        if(e.which == 13) {
            $(this).blur();
            return false;
        }
    });

});
</script>

@endsection
