@extends('layouts.front')
@section('content')
 <div class="container">
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Election Voting system</h1>
       
    </div>

    <div class="formdiv form1">
    <form action="{{ route('vote.store')}} " method="POST">
          @csrf
      <div class="card-deck mb-3 text-center">
         @foreach ($candidates as $key=>$candidate)
         @if($key <=1)
        <div class="card mb-4 box-shadow selectall">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{$candidate->name}}</h4>
          </div>
          <div class="card-body">
             <img class="card-img-top" style="min-height: 234px;" src="{{Storage::url($candidate->image->url)}}" alt="Card image cap">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" onclick="addvote('selectall',{{$candidate->id}},'yes')" name="candidate[{{$candidate->id}}]" id="candidateyes_{{$candidate->id}}" value="yes">
            <label class="form-check-label" for="candidateyes_{{$candidate->id}}">Yes</label>
        </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" onclick="addvote('selectall',{{$candidate->id}},'no')" name="candidate[{{$candidate->id}}]" id="candidateno_{{$candidate->id}}" value="no">
              <label class="form-check-label" for="candidateno_{{$candidate->id}}">No</label>
            </div>
           </div>
        </div>
        @else
      <div class="card mb-4 box-shadow selectanyone">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{$candidate->name}}</h4>
          </div>
          <div class="card-body">
             <img class="card-img-top" style="min-height:234px;" src="{{Storage::url($candidate->image->url)}}" alt="Card image cap">
            <div class="form-check form-check-inline">
            <input class="form-check-input selectanyoneradio" type="radio" name="candidate[{{$candidate->id}}]" onclick="addvote('candidateanyone',{{$candidate->id}},'yes')" id="candidateyes_{{$candidate->id}}" value="yes">
            <label class="form-check-label" for="candidateyes_{{$candidate->id}}">Yes</label>
        </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input selectanyoneradio" type="radio" name="candidate[{{$candidate->id}}]" onclick="addvote('candidateanyone',{{$candidate->id}},'no')" id="candidateno_{{$candidate->id}}" value="no">
              <label class="form-check-label" for="candidateno_{{$candidate->id}}">No</label>
            </div>
           </div>
        </div>
        @endif
          @endforeach
      </div>

          <input type="button" class="form-control formsubmit" value="save" id="form_1" >
      </div>
 <div class="formdiv form2" style="display: none;">

     <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" name="full_name" id="fullname" required placeholder="Full name">
   
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email" required aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone number</label>
    <input type="number" class="form-control" name="phone_number" id="phonenumber" placeholder="phonenumber">
  </div>
    <div>
        <label for="exampleInputPassword1">Member id</label>
        <input type="text" class="form-control" name="member_id" id="memberid" placeholder="memberid">
      </div>
      <div class="form-group" style="margin-top: 15px;">
        <input type="button" class="form-control formsubmit" value="save" id="form_2" >
    </div>
</div>

    <div class="formdiv form3" style="display: none;">
        <div class="form-group">
    <label for="exampleInputPassword1">Please enter OTP</label>
    <input type="text" style="display:inline;"  class="form-control col-md-6" name="opt" id="otp" placeholder="OTP">

    <input type="button" class="btn btn-success col-md-2" onclick="Verifyotp()" value="Verify">
    <div class="invalid-feedback" style="margin-left: 134px;">
        Otp Enter valid Otp
      </div>
      <div class="valid-feedback" style="margin-left: 134px;">
        Otp verified
    </div>

  </div>
 <input type="submit" style="display:none;" class="form-control formsubmit" value="Submit" id="finalsubmit" >
    </div>
</div>

</form>
      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
        
          </div>
           
        </div>
      </footer>
    </div>
@endsection



@section('js')
<script>
    $('.formsubmit').click(function(){
        var subid  = this.id;
        $('.formdiv').hide();
        var id = parseInt(subid.split('_')[1]);
       id +=1;
        $('.form'+id).show();
        if(id==3){
            var url = '{{ route("otp.create") }}';
            var email   = $('#email').val();       
                        $.ajax({
                            url:url,
                            type:'get',
                            data:{email:email},
                            success:function(resp){
                              $('#otp').val(resp);
                            }
                        })
                    }
                    
        

    });
    $(document).ready(function(){
        function addvote(div,candidate,value){

        }
       
    });

function Verifyotp(){
     $('.invalid-feedback').hide();
      $('.valid-feedback').hide();
   var otp =  $('#otp').val();
   var email =  $('#email').val();
 var url = '{{ route("otp.verify") }}';
            $.ajax({
                    url:url,
                    type:'get',
                    data:{email:email,otp:otp},
                    success:function(resp){
                      if(resp=='success'){
                    $('.valid-feedback').show();
                    $('#finalsubmit').show();


                      }else{
                        $('.invalid-feedback').show();

                      }
                    }
                })

}

    $('.selectanyoneradio').click(function(){

        $(".selectanyoneradio").each(function(i) 
             {
                  this.checked = false;
             });
        this.checked=true;

    });

</script>
@endsection