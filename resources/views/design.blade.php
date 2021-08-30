@extends('layouts.app')
@section('content')


<head>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        >
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            rel="shortcut icon"
            type="image/jpg"
            href="https://cdn.glitch.com/d08bb326-e251-4744-9266-f454d653c7c1%2Ffavicon.png?v=1624373448629"
        />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Import the webpage's stylesheet -->
        <link rel="stylesheet" href="/css/font.css" />
        <link rel="stylesheet" href="/css/style.css" />
        <title>Design</title>
    </head>

    <body>
        <div class="container">
            <div id="app">
            <div
              id="card"
              v-bind:style="{ 'background-image': 'url(' + background + ')' }"
            >
              <div id="overlay"></div>
              <img
                v-if="showLogo"
                v-bind:src="logo"
                v-bind:style="{ 'width': logoSize + 'px' }"
                id="logo"
              />

              <div id="qr-code"></div>

              <p id="name">
                <span
                  v-bind:style="{ 'font-size': fontSize + 'px', 'font-family': font }"
                  id="name-content"
                  >{{Auth::user()->page}}</span
                >
                <span class="hack">_</span>
              </p>
            </div>

                <div id="form-card">
                    <div class="row">
                        <h5>1. Logo</h5>
                        <div>
                            <label>Đổi logo (Ảnh PNG trong suốt, size &gt; 250px) </label>
                            <div class="input-group mb-3">
                                <input class="form-control" aria-describedby="LogoInput" aria-label="Upload" id="inputGroupFile03" type="file" @change="changeLogo" accept="image/*" />
                                <button v-if="showLogo" class="btn btn-outline-primary" v-on:click="showLogo = !showLogo" id="LogoInput">
                                    Ẩn Logo
                                </button>
                                <button v-else class="btn btn-outline-primary" v-on:click="showLogo = !showLogo" id="LogoInput">
                                    Hiện Logo
                                </button>
                                <button class="btn btn-outline-primary" v-on:click="logoSize -= 10" id="LogoInput">
                                    - Thu nhỏ
                                </button>
                                <button class="btn btn-outline-primary" v-on:click="logoSize += 10" id="LogoInput">
                                    + Phóng to
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h5>
                            2. QR Code (Nếu chưa có tạo mới tại
                            <a href="{{url('/links')}}" target="_blank">đây</a>
                            )
                        </h5>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="qrcodeInput">URL</span>
                            <input v-model="url" placeholder="URL" id="url" type="text" class="form-control" aria-describedby="qrcodeInput" />
                            <button class="btn btn-outline-primary" v-on:click="updateQR(-10)" id="qrcodeInput">
                                - Thu nhỏ
                            </button>
                            <button class="btn btn-outline-primary" v-on:click="updateQR(10)" id="qrcodeInput">
                                + Phóng to
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <h5>3. Ảnh nền</h5>
                        <div id="background-select">
                          <img
                            v-bind:src="bg"
                            v-for="bg in backgrounds"
                            v-on:click="setBackground(bg)"
                          />
                        </div>
                        <label>Đổi ảnh nền (Ảnh tỷ lệ 11:7, size &gt; 1100px X 700px) </label>
                        <div class="input-group mb-3">
                            <input class="form-control" aria-describedby="inputGroupFileAddon03" aria-label="Upload" type="file" @change="changeCustomBg" accept="image/*" />
                        </div>
                    </div>

                    <div class="row">
                        <h5>4. Tên thẻ</h5>
                        <div class="input-group mb-3">
                            <input v-model="name" placeholder="Tên trên thẻ" id="txt-name" type="text" class="form-control" aria-describedby="Font" />
                            <label class="input-group-text" for="Font">Font</label>
                            <select v-model="font" class="form-select" id="Font">
                                <option v-for="fnt in fonts" :value="fnt">{{'fnt'}}</option>
                            </select>
                            <button class="btn btn-outline-primary" v-on:click="fontSize -= 2" id="Font">
                                - Thu nhỏ
                            </button>
                            <button class="btn btn-outline-primary" v-on:click="fontSize += 2" id="Font">
                                + Phóng to
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5>5. Xuất file</h5>
                            <button class="btn btn-outline-primary" v-on:click="exportCard">
                                Tạo thẻ (Ảnh)
                            </button>
                            <button class="btn btn-outline-primary" v-on:click="exportPDF">
                                Tạo thẻ (PDF)
                            </button>

                            <p>
                                Nếu xuất file ảnh, in màu với <b>độ phân giải 300dpi</b> sẽ
                                được ảnh <b>tầm 8.7cm x 5.5cm</b>. <br />
                                Nếu xuất file PDF thì đem đi màu A4, chọn <b>Fit to Paper</b> khi in. <br />
                                Dán ảnh này lên thẻ NFC trắng <b>(8.55cm X 5.4cm)</b>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"
            integrity="sha512-VKjwFVu/mmKGk0Z0BxgDzmn10e590qk3ou/jkmRugAkSTMSIRkd4nEnk+n7r5WBbJquusQEQjBidrBD3IQQISQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"
            integrity="sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
            integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="/js/script.js" defer></script>
    </body>
@endsection