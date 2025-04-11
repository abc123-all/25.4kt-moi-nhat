@include('DoAn_NhomF.admin.header')
@include('DoAn_NhomF.admin.sidebar')
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                Home</a></div>
        <h1>Add New Voucher</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->
                        <form action="{{route('post_from_add_user')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                            <div class="control-group">
                                <label class="control-label">Code </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="code" required autofocus/> *
                                    @if ($errors->has('code'))
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description
                                </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="description" required autofocus/> *
                                    @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Discount_type
                                </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="discount_type" required autofocus/> *
                                    @if ($errors->has('discount_type'))
                                <span class="text-danger">{{ $errors->first('discount_type') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Discount_value
                                </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="discount_value" required autofocus/> *
                                    @if ($errors->has('discount_value'))
                                <span class="text-danger">{{ $errors->first('discount_value') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Status
                                </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="status" required autofocus/> *
                                    @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
@include('DoAn_NhomF.admin.footer')