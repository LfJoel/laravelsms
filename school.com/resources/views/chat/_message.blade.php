<div class="chat-header clearfix">
    @include('chat._header')
</div>
<div class="chat-history">
    @include('chat._chat')
</div>
<div class="chat-message clearfix">
    <form action="" method="post" id="SubmitMessage" class="mb-0" enctype="multipart/form-data">
        <input type="hidden" value="{{ $getReceiver->id }}" name="receiver_id">
        {{csrf_field()}}
        <div class="d-block">
            <textarea placeholder="Enter your text here.." name="message" id="ClearMessage"  class="form-control emoji"></textarea>

        </div>
        <div class="row justify-content-between">
            <div class="col-md-6 hidden-sm  mt-3">
                <a id="open_file" href="javascript:void(0);" class="btn btn-outline-primary mt-3"><i class="fa fa-image"></i></a>
            <input type="file" style="display:none;" name="file_name" id="file_name"> 
            <span id="getFileName"></span>
        </div>
            <div class="col-md-6 mt-3 t" style="text-align: right;"><button type="submit" class="btn btn-primary m-3">
                    <li class="fa fa-send "></li>
                </button> 
            </div>
        </div>
        <!-- <input type="text" class="form-control" placeholder="Enter text here...">
        <span class="input-group-text"><i class="fa fa-send"></i></span> -->
    </form>
</div>