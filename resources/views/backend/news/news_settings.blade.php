<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Greenergy | {{ (!empty($id)? $data->news_name : "Add News") }}</title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/font-awesome/css/font-awesome.min.css') }}">

    <!-- Dropzone.js -->
    <link href="{{ asset('/assets/backend/css/vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{ asset('/assets/backend/css/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('/assets/backend/css/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/assets/backend/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/css/main.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('backend.global.sidebar')


        <!-- top navigation -->
        @include('backend.global.header')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{{ (!empty($id)? "Edit News" : "Add News") }}</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>News Image</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    @if(!empty($id))
                      <p>Drag multiple files to the box below for multi upload or click to select files.</p>
                      <form action="/admin/news/image/upload/{{ $id }}" id="newsDropzone" class="dropzone">{{ csrf_field() }}</form>
                    @else
                      <p>Please upload content before uploading pictures.</p>
                    @endif



                  </div>
                </div>
              </div>
            </div>


            <form method="post" action="{{ (!empty($id)) ? '/admin/news/edit/'.$id : '/admin/news/add' }}" role="form">
              {{ csrf_field() }}

              @if(!empty($id))

                <input type="hidden" name="id" id="id" value="{{$id}}">

              @endif

              @if(Session::has('success'))
                <br /><br />
                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-check" aria-hidden="true"></i> {{Session::get('success')}}
                </div>
              @endif
              @if(Session::has('fail'))
                <br /><br />
                <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-check" aria-hidden="true"></i> {{Session::get('fail')}}
                </div>
              @endif

              @if (count($errors) > 0)
                <br /><br />
                @foreach ($errors->all() as $error)
                  <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <i class="icon wb-close" aria-hidden="true"></i> {{$error}}

                  </div>
              @endforeach
            @endif

             <!-- News Description-->
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>News Content</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> News Name<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="news-name" name="news-name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="News Name.." required="required" type="text" value="{{ old('news-name') ? old('news-name') : (!empty($id)) ? $data->news_name : "" }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> News Descriptions<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="x_content">
                            <div id="alerts"></div>
                            <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                              <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  <li><a data-edit="fontName PT Mono" style="font-family:'Verdana'">PT MONO</a></li><li><a data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li><li><a data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li><li><a data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li><li><a data-edit="fontName Arial Black" style="font-family:'Arial Black'">Arial Black</a></li><li><a data-edit="fontName Courier" style="font-family:'Courier'">Courier</a></li><li><a data-edit="fontName Courier New" style="font-family:'Courier New'">Courier New</a></li><li><a data-edit="fontName Comic Sans MS" style="font-family:'Comic Sans MS'">Comic Sans MS</a></li><li><a data-edit="fontName Helvetica" style="font-family:'Helvetica'">Helvetica</a></li><li><a data-edit="fontName Impact" style="font-family:'Impact'">Impact</a></li><li><a data-edit="fontName Lucida Grande" style="font-family:'Lucida Grande'">Lucida Grande</a></li><li><a data-edit="fontName Lucida Sans" style="font-family:'Lucida Sans'">Lucida Sans</a></li><li><a data-edit="fontName Tahoma" style="font-family:'Tahoma'">Tahoma</a></li><li><a data-edit="fontName Times" style="font-family:'Times'">Times</a></li><li><a data-edit="fontName Times New Roman" style="font-family:'Times New Roman'">Times New Roman</a></li><li><a data-edit="fontName Verdana" style="font-family:'Verdana'">Verdana</a></li></ul>
                              </div>

                              <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  <li>
                                    <a data-edit="fontSize 5">
                                      <p style="font-size:17px">Huge</p>
                                    </a>
                                  </li>
                                  <li>
                                    <a data-edit="fontSize 3">
                                      <p style="font-size:14px">Normal</p>
                                    </a>
                                  </li>
                                  <li>
                                    <a data-edit="fontSize 1">
                                      <p style="font-size:11px">Small</p>
                                    </a>
                                  </li>
                                </ul>
                              </div>

                              <div class="btn-group">
                                <a class="btn" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                <a class="btn" data-edit="italic" title="" data-original-title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                <a class="btn" data-edit="strikethrough" title="" data-original-title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                <a class="btn" data-edit="underline" title="" data-original-title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                              </div>

                              <div class="btn-group">
                                <a class="btn" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                <a class="btn" data-edit="insertorderedlist" title="" data-original-title="Number list"><i class="fa fa-list-ol"></i></a>
                                <a class="btn" data-edit="outdent" title="" data-original-title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                <a class="btn" data-edit="indent" title="" data-original-title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                              </div>

                              <div class="btn-group">
                                <a class="btn btn-info" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                <a class="btn" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                <a class="btn" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                <a class="btn" data-edit="justifyfull" title="" data-original-title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                              </div>

                              <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Hyperlink"><i class="fa fa-link"></i></a>
                                <div class="dropdown-menu input-append">
                                  <input class="span2" placeholder="URL" type="text" data-edit="createLink">
                                  <button class="btn" type="button">Add</button>
                                </div>
                                <a class="btn" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                              </div>

                              <div class="btn-group">
                                <a class="btn" title="" id="pictureBtn" data-original-title="Insert picture (or just drag &amp; drop)"><i class="fa fa-picture-o"></i></a>
                                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 41px; height: 34px;">
                              </div>

                              <div class="btn-group">
                                <a class="btn" data-edit="undo" title="" data-original-title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                <a class="btn" data-edit="redo" title="" data-original-title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                              </div>
                            </div>

                            <div id="editor" class="editor-wrapper placeholderText" contenteditable="true">
                              @if(!empty($id))
                                {!! $data->news_desc  !!}
                              @else
                                {!! old('descr') !!}
                              @endif
                            </div>

                            <textarea name="descr" id="descr" style="display:none;"></textarea>

                            <br />

                            <div class="ln_solid"></div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
              </div>
             </div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                          <button id="submit-btn" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </form>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('backend.global.footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('/assets/backend/css/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('/assets/backend/css/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/assets/backend/css/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/assets/backend/css/vendors/nprogress/nprogress.js')}}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ asset('/assets/backend/css/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>

    <!-- Dropzone.js -->
    <script src="{{ asset('/assets/backend/css/vendors/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script>
        var imageID   = {{ !empty($id)  ? $id : 0 }};
        Dropzone.options.newsDropzone = {
            thumbnailWidth: 100,
            thumbnailHeight: 100,
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;
                $.ajax({
                    type: 'get',
                    url: '/admin/news/image/delete/'+imageID,
                    data: "image="+name,
                    dataType: 'json',
                    success: function(message){

                        alert(message.message);
                        window.location.reload();

                    }
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
            init: function() {
                var thisDropzone = this;
                $.ajax({
                    type: "GET",
                    url: '/admin/news/image/list/',
                    data: 'id='+imageID,
                    dataType: "json",
                    success: function(data){
                        $.each(data.data, function(index, value) {
                            console.log(value.news_image)
                            var mockFile = { name: value.news_img};
                            thisDropzone.emit("addedfile", mockFile);
                            thisDropzone.emit("success", mockFile);
                            thisDropzone.emit("thumbnail", mockFile, 'http://greenergyled.localhost.com'+value.news_img)
                        });
                    }
                });
            },
            accept: function(file, done) {
                window.location.reload();
                return done();
            }
        };
    </script>

    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('/assets/backend/css/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/css/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ asset('/assets/backend/css/vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- bootstrap-wysiwyg -->
    <script>
        $(document).ready(function() {
            function initToolbarBootstrapBindings() {
                var fonts = ['PT Mono','Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                        'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                        'Times New Roman', 'Verdana'
                    ],
                    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                $.each(fonts, function(idx, fontName) {
                    fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                });
                $('a[title]').tooltip({
                    container: 'body'
                });
                $('.dropdown-menu input').click(function() {
                    return false;
                })
                    .change(function() {
                        $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                    })
                    .keydown('esc', function() {
                        this.value = '';
                        $(this).change();
                    });

                $('[data-role=magic-overlay]').each(function() {
                    var overlay = $(this),
                        target = $(overlay.data('target'));
                    overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                });

                if ("onwebkitspeechchange" in document.createElement("input")) {
                    var editorOffset = $('#editor').offset();

                    $('.voiceBtn').css('position', 'absolute').offset({
                        top: editorOffset.top,
                        left: editorOffset.left + $('#editor').innerWidth() - 35
                    });
                } else {
                    $('.voiceBtn').hide();
                }
            }

            function showErrorAlert(reason, detail) {
                var msg = '';
                if (reason === 'unsupported-file-type') {
                    msg = "Unsupported format " + detail;
                } else {
                    console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
            }

            initToolbarBootstrapBindings();

            $('#editor').wysiwyg({
                fileUploadError: showErrorAlert
            });

            $('#submit-btn').click(function(){
                $('#descr').html(
                    $("#editor").html()
                );
            });

            window.prettyPrint();
            prettyPrint('');
        });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- Select2 -->
    <script src="{{ asset('/assets/backend/css/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('/assets/backend/js/custom.min.js') }}"></script>
  </body>
</html>
