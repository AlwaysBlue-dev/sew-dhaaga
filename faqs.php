<?php 
$pageTitle = "FAQs - Sew Dhaaga";
include 'header.php'; 
?>
<style>
     body {
        background: linear-gradient(to right, #9c2d6a 0%, #9c2d6a 100%);
    }
    .card {
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #f8f9fa;
        text-align: center;
    }
    .card-header h2 {
        font-size: 1.8rem;
        margin-bottom: 0;
        color: #333;
    }
    .accordion-button {
        font-size: 1.1rem;
        font-weight: bold;
    }
    .accordion-body {
        font-size: 1rem;
        line-height: 1.6;
        padding: 20px;
    }
    .accordion-button:not(.collapsed) {
        background-color: #e9ecef;
    }
</style>

<div class="container-fluid" style="margin-top: 150px;">
   <div class="d-flex justify-content-center align-items-center">
  <h1 class="text-center text-white">🧵 FAQs – We've Got You Covered!</h1>
</div>


    <!-- Our Services Section -->
    <div class="card">
        <div class="card-header">
            <h2>💼 Our Services</h2>
        </div>
        <div class="card-body">
            <div class="accordion" id="our-services-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="our-services-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#our-services-collapseOne" aria-expanded="false" aria-controls="our-services-collapseOne">
                            How does Sewdhaaga work?
                        </button>
                    </h2>
                    <div id="our-services-collapseOne" class="accordion-collapse collapse" aria-labelledby="our-services-headingOne" data-bs-parent="#our-services-accordion">
                        <div class="accordion-body">
                            It’s super simple! You start by exploring our Style Library and creating your dream outfit. Once you're done, we pick up your unstitched suit, stitch it exactly how you designed it, and deliver the final outfit to your doorstep — all without you stepping out.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="our-services-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#our-services-collapseTwo" aria-expanded="false" aria-controls="our-services-collapseTwo">
                            Do you offer doorstep tailoring anywhere in Karachi?
                        </button>
                    </h2>
                    <div id="our-services-collapseTwo" class="accordion-collapse collapse" aria-labelledby="our-services-headingTwo" data-bs-parent="#our-services-accordion">
                        <div class="accordion-body">
                            Yes, we do! Just book a time for “Darzi at Your Doorstep”, and one of our expert tailors will come over to take your measurements and note your design. We handle the rest while you sit back and relax.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="our-services-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#our-services-collapseThree" aria-expanded="false" aria-controls="our-services-collapseThree">
                            I’m not sure what design I want — can you help?
                        </button>
                    </h2>
                    <div id="our-services-collapseThree" class="accordion-collapse collapse" aria-labelledby="our-services-headingThree" data-bs-parent="#our-services-accordion">
                        <div class="accordion-body">
                            Absolutely! That’s what our Style Library is for. Browse through a variety of styles, find inspiration, and pick the one that speaks to your inner designer.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="our-services-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#our-services-collapseFour" aria-expanded="false" aria-controls="our-services-collapseFour">
                            Can you pick up my fabric too?
                        </button>
                    </h2>
                    <div id="our-services-collapseFour" class="accordion-collapse collapse" aria-labelledby="our-services-headingFour" data-bs-parent="#our-services-accordion">
                        <div class="accordion-body">
                            Yes! We offer fabric pickup from your location — just let us know during the order process.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Timing & Delivery Section -->
    <div class="card">
        <div class="card-header">
            <h2>⏳ Timing & Delivery</h2>
        </div>
        <div class="card-body">
            <div class="accordion" id="timing-delivery-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="timing-delivery-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#timing-delivery-collapseOne" aria-expanded="false" aria-controls="timing-delivery-collapseOne">
                            How long does the stitching take?
                        </button>
                    </h2>
                    <div id="timing-delivery-collapseOne" class="accordion-collapse collapse" aria-labelledby="timing-delivery-headingOne" data-bs-parent="#timing-delivery-accordion">
                        <div class="accordion-body">
                            From pickup to final delivery, it usually takes about 7 days.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="timing-delivery-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#timing-delivery-collapseTwo" aria-expanded="false" aria-controls="timing-delivery-collapseTwo">
                            Is delivery free?
                        </button>
                    </h2>
                    <div id="timing-delivery-collapseTwo" class="accordion-collapse collapse" aria-labelledby="timing-delivery-headingTwo" data-bs-parent="#timing-delivery-accordion">
                        <div class="accordion-body">
                            There’s a small delivery fee added at checkout, based on your area.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="timing-delivery-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#timing-delivery-collapseThree" aria-expanded="false" aria-controls="timing-delivery-collapseThree">
                            What if I miss my pickup or delivery?
                        </button>
                    </h2>
                    <div id="timing-delivery-collapseThree" class="accordion-collapse collapse" aria-labelledby="timing-delivery-headingThree" data-bs-parent="#timing-delivery-accordion">
                        <div class="accordion-body">
                            No stress — just reschedule it through your dashboard or reach out to us, and we’ll help you sort it out.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing & Payments Section -->
    <div class="card">
        <div class="card-header">
            <h2>💳 Pricing & Payments</h2>
        </div>
        <div class="card-body">
            <div class="accordion" id="pricing-payments-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="pricing-payments-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pricing-payments-collapseOne" aria-expanded="false" aria-controls="pricing-payments-collapseOne">
                            How do you calculate the prices?
                        </button>
                    </h2>
                    <div id="pricing-payments-collapseOne" class="accordion-collapse collapse" aria-labelledby="pricing-payments-headingOne" data-bs-parent="#pricing-payments-accordion">
                        <div class="accordion-body">
                            We show base prices for each suit type (1-piece, 2-piece, 3-piece) on the services page. Add-ons like lace, buttons, etc., are clearly priced in the Lace Library. Once you're done designing, your final price appears before checkout.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="pricing-payments-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pricing-payments-collapseTwo" aria-expanded="false" aria-controls="pricing-payments-collapseTwo">
                            How do I pay?
                        </button>
                    </h2>
                    <div id="pricing-payments-collapseTwo" class="accordion-collapse collapse" aria-labelledby="pricing-payments-headingTwo" data-bs-parent="#pricing-payments-accordion">
                        <div class="accordion-body">
                            We accept cash or online payments. Tailor visit appointments require advance payment to confirm the slot.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="pricing-payments-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pricing-payments-collapseThree" aria-expanded="false" aria-controls="pricing-payments-collapseThree">
                            Can I get a refund or make changes?
                        </button>
                    </h2>
                    <div id="pricing-payments-collapseThree" class="accordion-collapse collapse" aria-labelledby="pricing-payments-headingThree" data-bs-parent="#pricing-payments-accordion">
                        <div class="accordion-body">
                            Once we pick up your fabric, refunds aren’t possible. But no worries — we offer 1 free alteration per outfit. After that, each alteration is just Rs. 200.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sizing & Custom Orders Section -->
    <div class="card">
        <div class="card-header">
            <h2>📐 Sizing & Custom Orders</h2>
        </div>
        <div class="card-body">
            <div class="accordion" id="sizing-custom-orders-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="sizing-custom-orders-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sizing-custom-orders-collapseOne" aria-expanded="false" aria-controls="sizing-custom-orders-collapseOne">
                            How do I make sure it fits me perfectly?
                        </button>
                    </h2>
                    <div id="sizing-custom-orders-collapseOne" class="accordion-collapse collapse" aria-labelledby="sizing-custom-orders-headingOne" data-bs-parent="#sizing-custom-orders-accordion">
                        <div class="accordion-body">
                            You can adjust measurements while designing your outfit in our Style Library. Want to be extra sure? Book Darzi at Your Doorstep and let our tailor take your measurements for the perfect fit.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="sizing-custom-orders-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sizing-custom-orders-collapseTwo" aria-expanded="false" aria-controls="sizing-custom-orders-collapseTwo">
                            Can I send you an old outfit as a sample?
                        </button>
                    </h2>
                    <div id="sizing-custom-orders-collapseTwo" class="accordion-collapse collapse" aria-labelledby="sizing-custom-orders-headingTwo" data-bs-parent="#sizing-custom-orders-accordion">
                        <div class="accordion-body">
                            Yes! Just hand it over when we pick up your fabric — we’ll match it exactly.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Website Features Section -->
    <div class="card">
        <div class="card-header">
            <h2>🌐 Website Features</h2>
        </div>
        <div class="card-body">
            <div class="accordion" id="website-features-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="website-features-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#website-features-collapseOne" aria-expanded="false" aria-controls="website-features-collapseOne">
                            How do I track my order?
                        </button>
                    </h2>
                    <div id="website-features-collapseOne" class="accordion-collapse collapse" aria-labelledby="website-features-headingOne" data-bs-parent="#website-features-accordion">
                        <div class="accordion-body">
                            You’ll find a Track Order page on our website where you can follow every step of the process.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="website-features-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#website-features-collapseTwo" aria-expanded="false" aria-controls="website-features-collapseTwo">
                            What’s the Style & Lace Library?
                        </button>
                    </h2>
                    <div id="website-features-collapseTwo" class="accordion-collapse collapse" aria-labelledby="website-features-headingTwo" data-bs-parent="#website-features-accordion">
                        <div class="accordion-body">
                            The Style Library lets you explore outfit designs and build your look. The Lace Library is where you pick details like buttons, borders, and embellishments — so you’re in full control of your look.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Support Section -->
    <div class="card">
        <div class="card-header">
            <h2>📞 Customer Support</h2>
        </div>
        <div class="card-body">
            <div class="accordion" id="customer-support-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="customer-support-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customer-support-collapseOne" aria-expanded="false" aria-controls="customer-support-collapseOne">
                            How can I reach out if I need help?
                        </button>
                    </h2>
                    <div id="customer-support-collapseOne" class="accordion-collapse collapse" aria-labelledby="customer-support-headingOne" data-bs-parent="#customer-support-accordion">
                        <div class="accordion-body">
                            We’re just a message away! Use our Contact Us page or chat with us on WhatsApp. We’re happy to help.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="customer-support-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customer-support-collapseTwo" aria-expanded="false" aria-controls="customer-support-collapseTwo">
                            What are your support hours?
                        </button>
                    </h2>
                    <div id="customer-support-collapseTwo" class="accordion-collapse collapse" aria-labelledby="customer-support-headingTwo" data-bs-parent="#customer-support-accordion">
                        <div class="accordion-body">
                            We’re available from 9:00 AM to 9:00 PM, Monday to Friday.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="customer-support-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customer-support-collapseThree" aria-expanded="false" aria-controls="customer-support-collapseThree">
                            Do you stitch men’s or kids’ clothes too?
                        </button>
                    </h2>
                    <div id="customer-support-collapseThree" class="accordion-collapse collapse" aria-labelledby="customer-support-headingThree" data-bs-parent="#customer-support-accordion">
                        <div class="accordion-body">
                            Right now, we focus on women’s wear, but we plan to expand soon.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="customer-support-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customer-support-collapseFour" aria-expanded="false" aria-controls="customer-support-collapseFour">
                            Are your tailors reliable?
                        </button>
                    </h2>
                    <div id="customer-support-collapseFour" class="accordion-collapse collapse" aria-labelledby="customer-support-headingFour" data-bs-parent="#customer-support-accordion">
                        <div class="accordion-body">
                            Yes! All our tailors are trained, verified professionals who take pride in their work.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>