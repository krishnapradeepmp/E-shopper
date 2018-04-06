<!DOCTYPE html>
<html lang="en">
    <!-- @Author Waqar Alamgir <waqarcs@yahoo.com> -->
    <head>
        <meta charset="utf-8">
        <title>Picture Editor - HTML5</title>
        <link rel="stylesheet" href="assets/css/plugins/bootstrap.css">
        <link rel="stylesheet" href="assets/css/master-wa.css">
        <!--[if lt IE 9]>
        <script type="text/javascript" src="assets/js/plugins/excanvas.js"></script>
        <![endif]-->
        <?php
        if (isset($_GET['load'])) {
            @session_start();
            if (isset($_SESSION['file_data'])) {
                ?>
                <script type="text/javascript">
                    var jsonData = eval('(' + "<?php echo str_replace("\n", '', addslashes($_SESSION['file_data'])); ?>" + ')');
                </script>
                <?php
            }
        }
        ?>
    </head>
    <body>

        <script type="text/javascript">
            var SITE_URL = '';
            var SITE_URL_APPLICATION = '';
        </script>

        <div class="mainWindow">

            <h2><img src="assets/images/pe.gif" alt="Picture Editor" /></h2>

            <div class="canvasWindow">
                <canvas id="canvas" width="500" height="300"></canvas>
                <div class="buttons-positions">
                    <!--<button class="btn btn-success" id="load-draft">Load Draft</button>--> 
                    <a href="/../eshopper/product-details.php?id=<?php echo $_GET['id']; ?>"<button class="btn btn-danger clear">Cancel Customizations</button></a> 
                    <!--<form name="insert" action="insertToCart.php?id=<?php // echo $_GET['id'];      ?>" method="POST">-->
                    <!--<input type="text" value="1" name="qty"  size="50"/>--> 
                        <!--<input type="submit" value="insertbutton" class="btn btn-success" id="rasterize" />-->
                    <!--<button class="btn btn-success" id="rasterize">Save Customizations</button>-->
                    <!--</form>-->
                    <div id="loader"><img src="assets/images/ajax-loader.gif" alt="loading"/> <span>Loading</span></div>
                </div>
            </div>

            <div class="controlsWindow">
                <div class="controlsWindowChild">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#object-compose" data-toggle="tab" id="_1">Compose</a></li>
                        <li><a href="#object-controls" data-toggle="tab" id="_2">Controls</a></li>
                        <li><a href="#object-export" data-toggle="tab" id="_3">Export</a></li>
                        <li><a href="#canvas-settings" data-toggle="tab" id="_4">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="object-compose">
                            <p>
                                <strong>Add image</strong>
                            </p>
                            <p class="image_url_p">
                                <!--<input type="text" id="image_url" class="last" placeholder="Enter image url" />-->
                                <?php
                                $url = "upload_image.php?id=" . $_GET['id'] . "&image=" . $_GET['image'];
                                if (isset($_GET['image2'])) {
                                    $url = $url . "&image2=" . $_GET['image2'];
                                }
                                if (isset($_GET['image3'])) {
                                    $url = $url . "&image3=" . $_GET['image3'];
                                }
                                if (isset($_GET['image4'])) {
                                    $url = $url . "&image4=" . $_GET['image4'];
                                }
                                if (isset($_GET['image5'])) {
                                    $url = $url . "&image5=" . $_GET['image5'];
                                }
                                ?>
                            <form action="<?php echo $url; ?>" method="POST" enctype="multipart/form-data">
                                <input type="file" name="image" value="" class="btn"/>
                                <br/>
                                <br/>
                                <!--<i>Paste an http url here.</i>-->
                                <!--<button class="btn add_image_btn" type="button">Add Image</button>-->
                                <input type="submit" class="btn" value="Add Image" />
                            </form>

                            </p>
                            <br/>
                            <p>
                                <strong>Add text</strong>
                            </p>
                            <p>
                                <input type="text" id="text-color" placeholder="Enter color i.e. #000" value="#000" />
                                <br/>
                                <select id="font-family">
                                    <option value="">Select font family</option>
                                    <option value="arial">Arial</option>
                                    <option value="helvetica">Helvetica</option>
                                    <option value="verdana">Verdana</option>
                                    <option value="georgia">Georgia</option>
                                    <option value="courier">Courier</option>
                                    <option value="comic sans ms">Comic Sans MS</option>
                                    <option value="impact">Impact</option>
                                    <option value="monaco">Monaco</option>
                                    <option value="optima">Optima</option>
                                </select>
                                <br/>
                                <textarea id="text" placeholder="Enter text here"></textarea>
                                <br/>
                                <button class="btn add_text_btn" type="button" id="add-text">Add Text</button>
                            </p>
                        </div>

                        <div class="tab-pane" id="object-controls">
                            <p>
                                <strong>Actions</strong>
                            </p>
                            <p>
                                <button class="btn" id="remove-selected">Remove selected object/group</button>
                            </p>
                            <br/>
                            <p>
                                <strong>Z-axis</strong>
                            </p>
                            <p>
                                <button id="send-backwards" class="btn">Send backwards</button>
                                <button id="send-to-back" class="btn">Send to back</button>
                                <button id="bring-forward" class="btn">Bring forwards</button>
                                <button id="bring-to-front" class="btn">Bring to front</button>
                            </p>
                            <br/>
                            <p>
                                <strong>Effects</strong>
                            </p>
                            <p>
                                <button id="shadowify" class="btn">Shadowify</button>
                            </p>
                            <br/>

                            <div id="text-wrapper">
                                <p>
                                    <strong>Edit Text</strong>
                                </p>
                                <p>
                                    <label for="text-edit">Text:</label>
                                    <textarea id="text-edit"></textarea>
                                </p>
                                <p>
                                    <label for="font-family-edit">Font family:</label>
                                    <select id="font-family-edit">
                                        <option value="">Select font family</option>
                                        <option value="arial">Arial</option>
                                        <option value="helvetica">Helvetica</option>
                                        <option value="verdana">Verdana</option>
                                        <option value="georgia">Georgia</option>
                                        <option value="courier">Courier</option>
                                        <option value="comic sans ms">Comic Sans MS</option>
                                        <option value="impact">Impact</option>
                                        <option value="monaco">Monaco</option>
                                        <option value="optima">Optima</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="text-align-edit">Text alignment:</label>
                                    <select id="text-align-edit">
                                        <option value="">Select alignment</option>
                                        <option value="left">Left</option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                        <option value="justify">Justify</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="text-bg-color">Background color:</label>
                                    <input type="text" id="text-bg-color" size="10" />
                                </p>
                                <p>
                                    <label for="text-lines-bg-color">Background text color:</label>
                                    <input type="text" id="text-lines-bg-color" size="10" />
                                </p>
                                <p>
                                    <label for="text-stroke-color">Stroke color:</label>
                                    <input type="text" id="text-stroke-color" />
                                </p>
                                <p>
                                    <label for="text-stroke-width">Stroke width:</label>
                                    <select id="text-stroke-width">
                                        <option value="">Select width</option>
                                        `<?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?>px</option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="text-font-size">Font size:</label>
                                    <select id="text-font-size">
                                        <option value="">Select font</option>
                                        <?php
                                        for ($i = 1; $i <= 120; $i++) {
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?>px</option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="text-line-height">Line height:</label>
                                    <select id="text-line-height">
                                        <option value="">Select height</option>
                                        <?php
                                        for ($i = 1; $i <= 10; $i++) {
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <button type="button" class="btn" id="text-cmd-bold">Bold</button>
                                    <button type="button" class="btn" id="text-cmd-italic">Italic</button>
                                    <button type="button" class="btn" id="text-cmd-underline">Underline</button>
                                    <button type="button" class="btn" id="text-cmd-linethrough">Linethrough</button>
                                    <button type="button" class="btn" id="text-cmd-overline">Overline</button>
                                </p>
                            </div>
                        </div>

                        <div class="tab-pane" id="object-export">
                            <p>
                                <strong>Save</strong>
                            </p>
                            <p>
                                <input type="text" id="item-qty" value="1" />
                                <button class="btn btn-success" id="rasterize">PNG</button>
                                <button class="btn btn-success" id="rasterize-jpeg">JPEG</button><br/>
                                <i>JPEG format does not support transparency, so set background to #fff before exporting it.</i>
                            </p>
                            <!--                            <br/>
                                                        <p>
                                                            <strong>Actions</strong>
                                                        </p>
                                                        <p>
                                                            <button class="btn btn-success" id="rasterize-draft">Save as Draft</button>
                                                        </p>-->
                        </div>

                        <div class="tab-pane" id="canvas-settings">
                            <p>
                                <strong>Image size</strong>
                            </p>
                            <p class="image_url_p">
                                <input type="text" id="image_size_w" placeholder="Enter image width" value="500" />
                                <br/>
                                <input type="text" id="image_size_h" class="last" placeholder="Enter image height" value="300" />
                                <br/>
                                <i>Maximum image size can be set to 600x400.</i>
                            </p>
                            <br/>
                            <p>
                                <strong>Select Background</strong>
                            </p>
                            <p>
                                <input type="text" id="canvas-background-picker" placeholder="Enter color i.e. #000" />
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <form id="downloadFileForm" method="POST" action="upload.php">
                <input type="hidden" id="file_data" name="file_data" />
                <input type="hidden" id="file_type" name="file_type" />
            </form>

            <div class="about">
                Built using fabric.js, jquery and bootstrap by <a target="_blank" href="http://twitter.com/wajrcs">@wajrcs</a> &nbsp;.&nbsp; <a href="https://github.com/waqar-alamgir/html5-picture-editor/fork">Fork</a> &nbsp;.&nbsp; <iframe width="95px" scrolling="0" height="21px" frameborder="0" allowtransparency="true" style="margin-bottom:-6px;" src="http://ghbtns.com/github-btn.html?user=waqar-alamgir&amp;repo=html5-picture-editor&amp;type=watch&amp;count=true"></iframe>
            </div>

        </div>
        <script type="text/javascript" src="assets/js/plugins/jquery.js"></script>
        <script type="text/javascript" src="assets/js/plugins/fabric.js"></script>
        <!--<script type="text/javascript" src="assets/js/pet.js"></script>-->
        <script type="text/javascript">

            /**
             * Class for all kind for event binding for Pet's commands and controls
             * 
             * @Author Waqar Alamgir <waqarcs@yahoo.com>
             * @Created 23 Sep 2013
             * @Modified 25 Sep 2013
             *
             */

            var MESSAGES = [
                'Fabric library is missing.',
                'Are you sure?',
                'This browser doesn\'t provide this feature',
                'Saved',
                'Post data is missing',
                'Saving draft',
                'Exporting as JPEG',
                'Exporting as PNG',
                'Loading from draft',
                'Maximum width of the image can be set to ',
                'Maximum height of the image can be set to ',
                'Value is invalid'
            ];

            var PAGES = [
                'draft.php',
                'view.php',
                'upload_cart.php'
            ];

            PetUtil = function ()
            {
                var that = this;
                var _timer = 0;

                that.getRandomNum = function (min, max)
                {
                    return Math.random() * (max - min) + min;
                };

                that.getImage = function (image)
                {
                    return SITE_URL_APPLICATION + PAGES[1] + '?v=' + encodeURIComponent(image);
                };

                that.hideLoader = function ()
                {
                    $('#loader img').show();
                    $('#loader').removeClass('show').find('span').text('Loading');
                };

                that.showLoader = function (text)
                {
                    $('#loader img').show();
                    $('#loader').addClass('show').find('span').text(text);
                };

                that.fadeOutLoader = function (text)
                {
                    if (_timer)
                    {
                        clearTimeout(_timer);
                    }

                    $('#loader').addClass('show').find('span').text(text);
                    $('#loader img').hide();

                    _timer = setTimeout(function ()
                    {
                        that.hideLoader();
                    }, 4000);
                };
            };

            petUtil = new PetUtil();

            Pet = function ()
            {
                var that = this;

                var _objectCompose = $('#object-compose');
                var _clear = $('#clear');
                var _rasterize = $('#rasterize');
                var _rasterizeJpeg = $('#rasterize-jpeg');
                var _rasterizeSvg = $('#rasterize-svg');
                var _rasterizeJson = $('#rasterize-json');
                var _rasterizeDraft = $('#rasterize-draft');
                var _removeSelected = $('#remove-selected');
                var _sendBackwards = $('#send-backwards');
                var _sendToBack = $('#send-to-back');
                var _bringForward = $('#bring-forward');
                var _bringToFront = $('#bring-to-front');
                var _shadowify = $('#shadowify');
                var _canvasBackgroundPicker = $('#canvas-background-picker');
                var _fontFamily = $('#font-family');
                var _imageUrl = $('#image_url');
                var _text = $('#text');
                var _originX = $('.origin-x');
                var _originY = $('.origin-y');
                var _complexity = $('#complexity strong');
                var _loadDraft = $('#load-draft');
                var _addImageBtn = 'add_image_btn';
                var _addTextBtn = 'add_text_btn';
                var _downloadFileForm = $('#downloadFileForm');
                var _fileData = $('#file_data');
                var _fileType = $('#file_type');
                var _textColor = $('#text-color');
                var _imageSizeW = $('#image_size_w');
                var _imageSizeH = $('#image_size_h');
                var _textWrapper = $('#text-wrapper');
                var _canvasEle = 'canvas';
                var _textEditor = $('#text-wrapper #text-edit');
                var _cmdBoldBtn = $('#text-cmd-bold');
                var _cmdItalicBtn = $('#text-cmd-italic');
                var _cmdUnderlineBtn = $('#text-cmd-underline');
                var _cmdLinethroughBtn = $('#text-cmd-linethrough');
                var _cmdOverlineBtn = $('#text-cmd-overline');
                var _fontFamilyEdit = $('#font-family-edit');
                var _textAlignEdit = $('#text-align-edit');
                var _texBgColor = $('#text-bg-color');
                var _textLinesBgColor = $('#text-lines-bg-color');
                var _textStrokeColor = $('#text-stroke-color');
                var _textStrokeWidth = $('#text-stroke-width');
                var _textFontSize = $('#text-font-size');
                var _textLineHeight = $('#text-line-height');

                var _event = 'click';
                var _blur = 'blur';
                var _change = 'change';
                var _focus = 'focus';
                var _keyup = 'keyup';
                var _canvas = new fabric.Canvas(_canvasEle);
                var _getRandomInt = fabric.util.getRandomInt;

                var _canvasWidth = 500;
                var _canvasHeight = 300;
                var _canvasMaxWidth = 600;
                var _canvasMaxHeight = 400;


                that.bootstrap = function (config)
                {
                    if (!fabric)
                    {
                        alert(MESSAGES[0]);
                        return;
                    }

                    if (config && config.canvasWidth)
                    {
                        _canvasWidth = config.canvasWidth;
                    }

                    if (config && config.canvasHeight)
                    {
                        _canvasHeight = config.canvasHeight;
                    }

                    _leEventBinding();

                    if (window.jsonData)
                    {
                        petUtil.showLoader(MESSAGES[8]);
                    }

                    setTimeout(function ()
                    {
                        _canvas.calcOffset();

                        if (window.jsonData)
                        {
                            _canvas.clear();
                            _canvas.loadFromDatalessJSON(window.jsonData);
                            setTimeout(function () {
                                _canvasBackgroundPicker.trigger('blur');
                                petUtil.hideLoader();
                            }, 1000);
                        }
                    }, 100);

                    _imageUrl.focus();

//                    var imageUrl = "http://localhost/eshopper/images/RoundNeck%20Tshirt.jpg";
                    var imageUrl = "<?php echo $_GET['image'] ?>";

                    fabric.Image.fromURL(imageUrl, function (image)
                    {
//            image.set({left: left, top: top, angle: angle, cornersize: 10});
//            image.scale(scale).setCoords();
                        _canvas.add(image);
                    });
<?php
if (isset($_GET['image2'])) {
    echo 'var imageUrl2 = "' . $_GET['image2'] . '";
    fabric.Image.fromURL(imageUrl2, function (image)
    {
        _canvas.add(image);
    });';
}
if (isset($_GET['image3'])) {
    echo 'var imageUrl3 = "' . $_GET['image3'] . '";
    fabric.Image.fromURL(imageUrl3, function (image)
    {
        _canvas.add(image);
    });';
}
if (isset($_GET['image4'])) {
    echo 'var imageUrl4 = "' . $_GET['image4'] . '";
    fabric.Image.fromURL(imageUrl4, function (image)
    {
        _canvas.add(image);
    });';
}
if (isset($_GET['image5'])) {
    echo 'var imageUrl5 = "' . $_GET['image5'] . '";
    fabric.Image.fromURL(imageUrl5, function (image)
    {
        _canvas.add(image);
    });';
}
?>

                };

                function _reAdjustCanvas()
                {
                    _canvas.calcOffset();
                }

                function _leEventBindingMain()
                {
                    _clear.bind(_event, function (event)
                    {
                        if (confirm(MESSAGES[1]))
                        {
                            _canvas.clear();
                        }
                    });

                    _loadDraft.bind(_event, function (event)
                    {
                        var url = SITE_URL_APPLICATION + '?load';
                        window.location.href = url;
                    });
                }

                function _leEventBindingCompose()
                {
                    _objectCompose.bind(_event, function (event)
                    {
                        var element = event.target;
                        if (element.nodeName.toLowerCase() === 'strong')
                        {
                            element = element.parentNode;
                        }

                        var className =
                                element.className,
                                offset = 50,
                                left = fabric.util.getRandomInt(0 + offset, _canvasWidth - offset),
                                top = fabric.util.getRandomInt(0 + offset, _canvasHeight - offset),
                                scale = 1;
                        angle = 0;
                        opacity = 1;

                        if ($(element).hasClass(_addImageBtn))
                        {
                            var imageUrl = _imageUrl.val();
//                                alert(imageUrl);

                            if (imageUrl != '')
                            {
//					imageUrl = petUtil.getImage(imageUrl);
//                                        alert(imageUrl);
                                fabric.Image.fromURL(imageUrl, function (image)
                                {
                                    image.set({left: left, top: top, angle: angle, cornersize: 10});
                                    image.scale(scale).setCoords();
                                    _canvas.add(image);
                                });
                            }

                            _imageUrl.val('').focus();
                        }

                        if ($(element).hasClass(_addTextBtn))
                        {
                            var text = _text.val();
                            var font = _fontFamily.val();
                            var color = _textColor.val();

                            if (text != '' && font != '' && color != '')
                            {
                                var textObject = new fabric.Text(
                                        text,
                                        {
                                            left: 0,
                                            top: 0,
                                            fontSize: 20,
                                            lineHeight: 1,
                                            fontFamily: font,
                                            angle: angle,
                                            fill: color,
                                            scaleX: 1,
                                            scaleY: 1,
                                            fontWeight: '',
                                            originX: 'left',
                                            hasRotatingPoint: true
                                        });
                                _canvas.add(textObject);
                                _text.val('').focus();
                            } else if (color == '')
                            {
                                _textColor.focus();
                            } else if (font == '')
                            {
                                _fontFamily.focus();
                            } else if (text == '')
                            {
                                _text.focus();
                            }
                        }

                        _reAdjustCanvas();
                    });
                }

                function _leEventBindingExport()
                {
                    _rasterize.bind(_event, function (event)
                    {
                        petUtil.showLoader(MESSAGES[7]);
                        if (!fabric.Canvas.supports('toDataURL'))
                        {
                            petUtil.fadeOutLoader(MESSAGES[2]);
                        } else
                        {
                            _fileData.val(_canvas.toDataURL('png'));
                            _fileType.val('png');
                            _downloadFileForm.submit();
                            petUtil.fadeOutLoader(MESSAGES[3]);
                        }
                        $.post(SITE_URL_APPLICATION + PAGES[2], {file_data: _canvas.toDataURL('png'), qty: $('#item-qty').val(), id: <?php echo $_GET['id'] ?>}, function (r)
                        {
//                            if (r == '1')
//                            {
//                                petUtil.fadeOutLoader(MESSAGES[3]);
//                            } else
//                            {
//                                petUtil.fadeOutLoader(MESSAGES[4]);
//                            }
//                            alert(r);
                            alert("Added to Cart Successfully...");
                            window.location = "/../eshopper/index.php";
                        });
                    });

                    _rasterizeJpeg.bind(_event, function (event)
                    {
                        petUtil.showLoader(MESSAGES[6]);
                        if (!fabric.Canvas.supports('toDataURL'))
                        {
                            petUtil.fadeOutLoader(MESSAGES[2]);
                        } else
                        {
                            _fileData.val($('#' + _canvasEle).get(0).toDataURL('image/jpeg', 100));
                            _fileType.val('jpeg');
                            _downloadFileForm.submit();
                            petUtil.fadeOutLoader(MESSAGES[3]);
                        }

                        $.post(SITE_URL_APPLICATION + PAGES[2], {file_data: _canvas.toDataURL('png'), qty: $('#item-qty').val(), id: <?php echo $_GET['id'] ?>}, function (r)
                        {
//                            if (r == '1')
//                            {
//                                petUtil.fadeOutLoader(MESSAGES[3]);
//                            } else
//                            {
//                                petUtil.fadeOutLoader(MESSAGES[4]);
//                            }
                            alert("Added to Cart Successfully...");
                            window.location = "/../eshopper/index.php";
                        });

                    });

                    _rasterizeDraft.bind(_event, function (event)
                    {
                        petUtil.showLoader(MESSAGES[5]);
                        $.post(SITE_URL_APPLICATION + PAGES[0], {file_data: JSON.stringify(_canvas.toDatalessJSON())}, function (r)
                        {
                            if (r == '1')
                            {
                                petUtil.fadeOutLoader(MESSAGES[3]);
                            } else
                            {
                                petUtil.fadeOutLoader(MESSAGES[4]);
                            }
                        });
                    });
                }

                function _leEventBindingControls()
                {
                    _removeSelected.bind(_event, function (event)
                    {
                        var activeObject = _canvas.getActiveObject();
                        var activeGroup = _canvas.getActiveGroup();
                        if (activeGroup)
                        {
                            var objectsInGroup = activeGroup.getObjects();
                            _canvas.discardActiveGroup();
                            objectsInGroup.forEach(function (object)
                            {
                                _canvas.remove(object);
                            });
                        } else if (activeObject)
                        {
                            _canvas.remove(activeObject);
                        }
                    });

                    _sendBackwards.bind(_event, function (event)
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject)
                        {
                            _canvas.sendBackwards(activeObject);
                        }
                    });

                    _sendToBack.bind(_event, function (event)
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject)
                        {
                            _canvas.sendToBack(activeObject);
                        }
                    });

                    _bringForward.bind(_event, function (event)
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject)
                        {
                            _canvas.bringForward(activeObject);
                        }
                    });

                    _bringToFront.bind(_event, function (event)
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject)
                        {
                            _canvas.bringToFront(activeObject);
                        }
                    });

                    _shadowify.bind(_event, function (event)
                    {
                        var obj = _canvas.getActiveObject();
                        if (!obj)
                            return;
                        if (obj.shadow)
                        {
                            obj.shadow = null;
                        } else
                        {
                            obj.setShadow({
                                color: 'rgba(0,0,0,0.15)',
                                blur: 10,
                                offsetX: 6,
                                offsetY: 6
                            });
                        }
                        _canvas.renderAll();
                    });
                }

                function _leEventBindingSettings()
                {
                    _canvasBackgroundPicker.bind(_blur, function ()
                    {
                        _canvas.backgroundColor = _canvasBackgroundPicker.val();
                        _canvas.renderAll();
                    });

                    _imageSizeW.bind(_blur, function ()
                    {
                        var w = _imageSizeW.val();
                        if (!isNaN(w) && w <= _canvasMaxWidth)
                        {
                            _canvas.setWidth(w);
                            _canvas.renderAll();
                        } else if (!isNaN(w) && w > _canvasMaxWidth)
                        {
                            petUtil.fadeOutLoader(MESSAGES[9] + _canvasMaxWidth);
                        } else
                        {
                            petUtil.fadeOutLoader(MESSAGES[11]);
                        }
                    });

                    _imageSizeH.bind(_blur, function ()
                    {
                        var h = _imageSizeH.val();
                        if (!isNaN(h) && h <= _canvasMaxHeight)
                        {
                            _canvas.setHeight(h);
                            _canvas.renderAll();
                        } else if (!isNaN(h) && h > _canvasMaxHeight)
                        {
                            petUtil.fadeOutLoader(MESSAGES[10] + _canvasMaxHeight);
                        } else
                        {
                            petUtil.fadeOutLoader(MESSAGES[11]);
                        }
                    });
                }

                function _leEventBindingSectionText()
                {
                    _canvas.on('object:selected', _onObjectSelected);
                    _canvas.on('group:selected', _onObjectSelected);
                    _canvas.on('selection:cleared', function (e)
                    {
                        _textWrapper.hide();
                    });

                    _cmdBoldBtn.bind(_event, function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.fontWeight = (activeObject.fontWeight == 'bold' ? '' : 'bold');
                            activeObject.fontWeight ? _cmdBoldBtn.addClass('selected') : _cmdBoldBtn.removeClass('selected');
                            _canvas.renderAll();
                        }
                    });

                    _cmdItalicBtn.bind(_event, function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.fontStyle = (activeObject.fontStyle == 'italic' ? '' : 'italic');
                            activeObject.fontStyle ? _cmdItalicBtn.addClass('selected') : _cmdItalicBtn.removeClass('selected');
                            _canvas.renderAll();
                        }
                    });

                    _textEditor.bind(_focus, function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            _textEditor.val(activeObject.text);
                        }
                    });

                    _textEditor.bind(_keyup, function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject)
                        {
                            if (!_textEditor.val())
                            {
                                _canvas.discardActiveObject();
                            } else
                            {
                                activeObject.setText(_textEditor.val());
                            }
                            _canvas.renderAll();
                        }
                    });

                    _textAlignEdit.change(function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            var value = _textAlignEdit.val().toLowerCase();
                            activeObject.textAlign = value;
                            _canvas._adjustPosition && _canvas._adjustPosition(activeObject, value === 'justify' ? 'left' : value);
                            _canvas.renderAll();
                        }
                    });

                    _fontFamilyEdit.change(function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.fontFamily = _fontFamilyEdit.val().toLowerCase();
                            _canvas.renderAll();
                        }
                    });

                    _texBgColor.change(function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.backgroundColor = _texBgColor.val().toLowerCase();
                            _canvas.renderAll();
                        }
                    });

                    _textLinesBgColor.change(function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.textBackgroundColor = _textLinesBgColor.val();
                            _canvas.renderAll();
                        }
                    });

                    _textFontSize.change(function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.setFontSize(parseInt(_textFontSize.val(), 10));
                            _canvas.renderAll();
                        }
                    });

                    _textStrokeColor.change(function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.stroke = _textStrokeColor.val();
                            _canvas.renderAll();
                        }
                    });

                    _textStrokeWidth.change(function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.strokeWidth = parseInt(_textStrokeWidth.val(), 10);
                            _canvas.renderAll();
                        }
                    });

                    _textLineHeight.change(function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.setLineHeight(parseInt(_textLineHeight.val(), 10));
                            _canvas.renderAll();
                        }
                    });

                    _cmdUnderlineBtn.bind(_event, function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.textDecoration = (activeObject.textDecoration == 'underline' ? '' : 'underline');
                            if (activeObject.textDecoration === 'underline')
                            {
                                _cmdUnderlineBtn.addClass('selected');
                                _cmdLinethroughBtn.removeClass('selected');
                                _cmdOverlineBtn.removeClass('selected');
                            } else
                            {
                                _cmdUnderlineBtn.removeClass('selected');
                            }
                            _canvas.renderAll();
                        }
                    });

                    _cmdLinethroughBtn.bind(_event, function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.textDecoration = (activeObject.textDecoration == 'line-through' ? '' : 'line-through');
                            if (activeObject.textDecoration === 'line-through')
                            {
                                _cmdLinethroughBtn.addClass('selected');
                                _cmdUnderlineBtn.removeClass('selected');
                                _cmdOverlineBtn.removeClass('selected');
                            } else
                            {
                                _cmdLinethroughBtn.removeClass('selected');
                            }
                            _canvas.renderAll();
                        }
                    });

                    _cmdOverlineBtn.bind(_event, function ()
                    {
                        var activeObject = _canvas.getActiveObject();
                        if (activeObject && /text/.test(activeObject.type))
                        {
                            activeObject.textDecoration = (activeObject.textDecoration == 'overline' ? '' : 'overline');
                            if (activeObject.textDecoration === 'overline')
                            {
                                _cmdOverlineBtn.addClass('selected');
                                _cmdUnderlineBtn.removeClass('selected');
                                _cmdLinethroughBtn.removeClass('selected');
                            } else
                            {
                                _cmdOverlineBtn.removeClass('selected');
                            }
                            _canvas.renderAll();
                        }
                    });
                }

                function _onObjectSelected(e)
                {
                    var selectedObject = e.target;
                    if (/text/.test(selectedObject.type))
                    {
                        _textWrapper.show();
                        _textEditor.val(selectedObject.getText());

                        var buttons = [_textEditor, _cmdBoldBtn, _cmdItalicBtn, _cmdUnderlineBtn, _cmdLinethroughBtn, _cmdOverlineBtn];
                        for (var i = 0; i < buttons.length; i++)
                        {
                            buttons[i].attr('class', 'btn');
                        }

                        if (selectedObject.fontWeight === 'bold')
                        {
                            _cmdBoldBtn.addClass('selected');
                        }
                        if (selectedObject.textDecoration === 'underline')
                        {
                            _cmdUnderlineBtn.addClass('selected');
                        }
                        if (selectedObject.textDecoration === 'line-through')
                        {
                            _cmdLinethroughBtn.addClass('selected');
                        }
                        if (selectedObject.textDecoration === 'overline')
                        {
                            _cmdOverlineBtn.addClass('selected');
                        }
                        if (selectedObject.fontStyle === 'italic')
                        {
                            _cmdItalicBtn.addClass('selected');
                        }
                        if (selectedObject.fontStyle === 'italic')
                        {
                            _cmdItalicBtn.addClass('selected');
                        }

                        _fontFamilyEdit.val(selectedObject.get('fontFamily').toLowerCase());
                        _textAlignEdit.val(fabric.util.string.capitalize(selectedObject.get('textAlign')));
                        _texBgColor.val(selectedObject.get('backgroundColor'));
                        _textLinesBgColor.val(selectedObject.get('textBackgroundColor'));
                        _textStrokeColor.val(selectedObject.get('stroke'));
                        _textStrokeWidth.val(selectedObject.get('strokeWidth'));
                        _textFontSize.val(selectedObject.get('fontSize'));
                        _textLineHeight.val(selectedObject.get('lineHeight'));
                    } else
                    {
                        _textWrapper.hide();
                    }
                }

                function _leEventBinding()
                {
                    _leEventBindingMain();
                    _leEventBindingCompose();
                    _leEventBindingControls();
                    _leEventBindingExport();
                    _leEventBindingSectionText();
                    _leEventBindingSettings();
                }
            };
        </script>
        <script type="text/javascript" src="assets/js/master-wa.js"></script>

    </body>
</html>