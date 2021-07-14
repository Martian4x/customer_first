<div class="modal fade" id="mob_no_otp_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" id="myModalLabel4">Mobile Phone No verification</h4>
           </div>
           <div class="modal-body">
               <div class="row text-center">
                     <p class="user_otp_msg"></p>
                     <p>Please enter the OTP codes</p>
                     <div class="form-group">
                        <div class="col-lg-12 no-padding">
                           <label for="inputEmail1" class="col-lg-2 control-label">Codes:</label>
                           <div class="col-lg-8 no-padding">
                              <div class="input-group">
                                 {!! Form::number('user_otp', null, ['placeholder'=>'OTP', 'class'=>'form-control', 'required', 'id'=>'user_otp']) !!} 
                                 <span class="input-group-btn">
                                    <a href="javascript:;" onclick="verifyOTP({{\Auth::id()}})" class="btn btn-primary">Verify</a>
                                 </span>
                                 {!! $errors->first('user_otp', '<small class="error">:message</small>') !!}
                                 <input type="hidden" id="otp_pid_id">
                             </div>
                           </div>
                        </div>
                        <p>You didn't get the sms. <a href="javascript:;" onclick="requestOTP({{\Auth::id()}})" class="orange">Send Again</a></p>
                     </div>
               </div>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
           </div>
       </div>
   </div>
</div>