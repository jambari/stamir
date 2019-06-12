@section('after_style')
<style>
	input[type=file] {
	display: block !important;
	right: 1px;
	top: 1px;
	height: 34px;
	opacity: 0;
  width: 100%;
	background: none;
	position: absolute;
  overflow: hidden;
  z-index: 2;
}

.control-fileupload {
	display: block;
	border: 1px solid #d6d7d6;
	background: #FFF;
	border-radius: 4px;
	width: 100%;
	height: 36px;
	line-height: 36px;
	padding: 0px 10px 2px 10px;
  overflow: hidden;
  position: relative;
  
  &:before, input, label {
    cursor: pointer !important;
  }
  /* File upload button */
  &:before {
    /* inherit from boostrap btn styles */
    padding: 4px 12px;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 20px;
    color: #333333;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
    cursor: pointer;
    background-color: #f5f5f5;
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border: 1px solid #cccccc;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-bottom-color: #b3b3b3;
    border-radius: 4px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    transition: color 0.2s ease;

    /* add more custom styles*/
    content: 'Browse';
    display: block;
    position: absolute;
    z-index: 1;
    top: 2px;
    right: 2px;
    line-height: 20px;
    text-align: center;
  }
  &:hover, &:focus {
    &:before {
      color: #333333;
      background-color: #e6e6e6;
      color: #333333;
      text-decoration: none;
      background-position: 0 -15px;
      transition: background-position 0.2s ease-out;
    }
  }
  
  label {
    line-height: 24px;
    color: #999999;
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    position: relative;
    z-index: 1;
    margin-right: 90px;
    margin-bottom: 0px;
    cursor: text;
  }
}
</style>
@endsection
<form method="POST" action="/admin/import-hujan" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-group">
 		<span class="control-fileupload">
          <label for="file">Pilih Berkas :</label>
          <input type="file" name="file" required="required">
        </span>
  </div>



@error('hujan')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<input id="submit-hujan" type="submit" class="btn btn-success btn-block" value="Unggah">
</form>


@section('aftr_script')

<script>
	$(function() {
  $('input[type=file]').change(function(){
    var t = $(this).val();
    var labelText = 'File : ' + t.substr(12, t.length);
    $(this).prev('label').text(labelText);
  })
});
</script>

@endsection