<script src="https://cdn.jsdelivr.net/gh/gitbrent/pptxgenjs@3.12.0/dist/pptxgen.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/pptxgenjs@3.12.0/libs/jszip.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/pptxgenjs@3.12.0/dist/pptxgen.min.js"></script>
<div class="hoarding row">
    <div class="col-md-8"><img src="<?php echo base_url('AdminPanelNew/assets/images/hoarding3.jpg')?>" alt="hoarding"
            height="300" id="image1">
    </div>
    <div class="col-md-4">
        <div class="info" style="padding-top:60px">
            <label>Address</label>
            <div class="" id="add">
                <div class="mb-1">
                    <p>1st floor, 18, Shanku Marg, above SBI Bank SME Branch, Freeganj, Madhav Nagar,
                        Ujjain,
                        Madhya Pradesh 456010</p>
                </div>
                <div class="mb-1">
                    <p>Lat-19.84965246 / Long-75.34271975 </p>
                </div>
                <div class="mb-1">
                    <p>W : 40 x H : 30 - Non Lit</p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="m-0">
<!-- ------------- -->
<div class="hoarding row py-5 align-items-center" style="    background: #fafdf3;">

    <div class="col-md-4">
        <div class="info" style="padding-top:60px">
            <label>Address</label>
            <div class="" id="add2">
                <div class="mb-1">
                    <p>1st floor, 18, Shanku Marg, above SBI Bank SME Branch, Freeganj, Madhav Nagar,
                        Ujjain,
                        Madhya Pradesh 456010</p>
                </div>
                <div class="mb-1">
                    <p>Lat-19.84965246 / Long-75.34271975 </p>
                </div>
                <div class="mb-1">
                    <p>W : 40 x H : 30 - Non Lit</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 text-center">
        <img src="<?php echo base_url('AdminPanelNew/assets/images/hoarding4.jpg')?>" alt="hoarding" height="300"
            id="image2">
    </div>
</div>
<hr class="m-0">
<div class="hoarding row py-5 align-items-center" style="padding-left: 50px;">
    <div class="col-md-8 text-center">
        <img src="<?php echo base_url('AdminPanelNew/assets/images/hoarding5.jpg')?>" alt="hoarding" height="300"
            id="image3">
    </div>
    <div class="col-md-4">
        <div class="info" style="padding-top:60px">
            <label>Address</label>
            <div class="" id="add3">
                <div class="mb-1">
                    <p>1st floor, 18, Shanku Marg, above SBI Bank SME Branch, Freeganj, Madhav Nagar,
                        Ujjain,
                        Madhya Pradesh 456010</p>
                </div>
                <div class="mb-1">
                    <p>Lat-19.84965246 / Long-75.34271975 </p>
                </div>
                <div class="mb-1">
                    <p>W : 40 x H : 30 - Non Lit</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="justify-content-center mb-2 row">
    <div class="col-md-3">
        <button onclick="ppt_Without_Logo()" type="button" class="submit_btn w-100">PPT Without
            Logo</button>
    </div>
    <div class="col-md-3">
        <button onclick="pptWithLogo()" type="button" class="submit_btn w-100">PPT With Logo</button>
    </div>
</div>
<script>
function pptWithLogo() {
    var pptx = new PptxGenJS();
    var address1 = document.getElementById("add").innerText;
    var imgSrc1 = document.getElementById("image1").src;
    var address2 = document.getElementById("add2").innerText;
    var imgSrc2 = document.getElementById("image2").src;
    var address3 = document.getElementById("add3").innerText;
    var imgSrc3 = document.getElementById("image3").src;

    // Function to add a slide with an image and text
    function addSlideWithImageAndText(imagePath, text, slideNumber) {
        // Add a slide
        let slide = pptx.addSlide();

        // Add the image to the slide
        slide.addImage({
            path: "http://localhost:8080/AdminPanelNew/assets/images/logo2.jpg",
            x: 0.5,
            y: 0.2,
            w: 1.2,
            h: 1
        });
        slide.addImage({
            path: imagePath,
            x: 2.1,
            y: 0.2,
            w: 7,
            h: 3.5
        });

        // Add "Address" label with color
        slide.addText("Address:", {
            x: 0.5,
            y: 3.5,
            w: 2.1,
            h: 1,
            fontSize: 12,
            bold: true,
            color: '#027c71' // dark gren color
        });


        // Add the actual address text below the label
        slide.addText(text, {
            x: 2.1,
            y: 4.5,
            w: 4.1,
            fontSize: 12,
            color: '000000'
        });
        // Optional: Add slide number
        slide.addText(`Slide ${slideNumber}`, {
            x: 5,
            y: 5,
            fontSize: 12,
            color: '888888'
        });
    }

    addSlideWithImageAndText(imgSrc1, address1, 1);
    addSlideWithImageAndText(imgSrc2, address2, 2);
    addSlideWithImageAndText(imgSrc3, address3, 3);
    // Add more slides as needed

    // Save the presentation
    pptx.writeFile();
}

function ppt_Without_Logo() {
    var pptx = new PptxGenJS();
    var address1 = document.getElementById("add").innerText;
    var imgSrc1 = document.getElementById("image1").src;
    var address2 = document.getElementById("add2").innerText;
    var imgSrc2 = document.getElementById("image2").src;
    var address3 = document.getElementById("add3").innerText;
    var imgSrc3 = document.getElementById("image3").src;

    // Function to add a slide with an image and text
    function addSlideWithImageAndText(imagePath, text, slideNumber) {
        // Add a slide
        let slide = pptx.addSlide();
        slide.addImage({
            path: imagePath,
            x: 1.1,
            y: 0.2,
            w: 8,
            h: 3.5
        });
        // Add "Address" label with color
        slide.addText("Address:", {
            x: 1.1,
            y: 3.5,
            w: 2.1,
            h: 1,
            fontSize: 12,
            bold: true,
            color: '#027c71' // dark gren color
        });
        slide.addText(text, {
            x: 2.1,
            y: 4.5,
            w: 4.1,
            fontSize: 12,
            color: '000000'
        });

        // Optional: Add slide number
        slide.addText(`Slide ${slideNumber}`, {
            x: 5,
            y: 5,
            fontSize: 12,
            color: '888888'
        });
    }

    addSlideWithImageAndText(imgSrc1, address1, 1);
    addSlideWithImageAndText(imgSrc2, address2, 2);
    addSlideWithImageAndText(imgSrc3, address3, 3);
    // Add more slides as needed

    // Save the presentation
    pptx.writeFile();
}
</script>