@extends('site.v2.master.app')

@section('title', 'Welcome!')
@section('description', 'You can trust our People, Expertise and Services to Simplify your Customs and Logistics Processes.')
@section('image', asset('v1/img/nearshoring.png'))

@section('content')
    <div id="featured" class="d-flex justify-content-center align-items-center my-5">
        <div class="star">
            <p class="text-center">
                You can trust our People, Expertise and Services to Simplify your Customs and Logistics Processes.<br>
                <strong>Free your resources to focus in your core business</strong>
            </p>
        </div>
    </div>

    <section id="main" class="container mb-5">
        <div class="row">
            <div class="col-md-4 text-center mb-3">
                <i class="fa-solid big-60 fa-check-to-slot mb-2"></i>
                <h2>Trade with <strong>confidence</strong></h2>
                <p class="small-paragraph-clean">
                    Our local Experts help you establish and maintain Trade Compliance Programs, meet Audit Requirements and manage Trade Security Agenda.
                </p>
            </div>
            <div class="col-md-4 text-center mb-3">
                <i class="fa-solid big-60 fa-chess-knight mb-2"></i>
                <h2>Trade <strong>strategically</strong></h2>
                <p class="small-paragraph-clean">
                    Nearshoring reduce Cost and Times in your Supply Chain; take advantage of the GoPro Trade & Logistics Control Tower Experts and Services and focus in what is most convenient to you Company.
                </p>
            </div>
            <div class="col-md-4 text-center mb-3">
                <i class="fa-solid big-60 fa-seedling mb-2"></i>
                <h2>Grow your <strong>business</strong></h2>
                <p class="small-paragraph-clean">
                    We arm your Trade & Logistics Team to connect and work within our GoProTrade Control Tower Programs and Professionals according to your import or export needs; setting up the correct processes and controls to enhance and improve your supply chain! Let you import & export worry free!
                </p>
            </div>
            <div class="col-md-8 offset-md-2 text-center mb-3">
                <i class="fa-solid big-60 fa-tower-observation mb-2"></i>
                <h2><strong>Foreign trade management and control</strong> Tower Service Solutions</h2>
                <p class="small-paragraph-clean">
                    Import & Export from Mexico is becoming more complex. Our Trade and Logistics Experts set compliance programs; identifying risks as well opportunities for cost savings and process improvements.
                </p>
            </div>
        </div>
    </section>

    <div class="featured d-flex justify-content-center align-items-center my-5">
        <div class="star">
            <p class="text-center">
                <strong>Arm your Trade and Logistics Control Tower Solutions According to your Needs!</strong>
            </p>
        </div>
    </div>

    <section id="main-services" class="container mb-5">
        <div class="row mb-5 align-items-center">
            <div class="col-md-6 order-1">
                <h3>Traffic & Logistics Control Tower</h3>
                <p class="small-paragraph-clean">
                    GoProTrade has developed a Control Tower that provides knowledge on the best practices for the administration of import / export operations, adhering to the applicable regulations on different issues related to foreign trade.
                </p>
                <p class="small-paragraph-clean">
                    Acting as an interface between suppliers and our clients; we leverage our expertise, organization and processes necessary to help you coordinate your import and export operations. We set up a team –in house- to attend only to your requirements; in coordination with T&L control tower.
                </p>
                <p class="small-paragraph-clean">
                    Reduce costs and manage your Trade Compliance Processes and Programs!
                </p>
                <h4 class="gradient">IMMEX</h4>
                {{-- <img width="249" height="61" class="img-fluid" src="{{ asset('v1/img/services/immex.png') }}" alt="IMMEX"> --}}
                <p class="small-paragraph-clean">
                    Temporarily import raw materials, parts and components into Mexico for assembly within a set time frame without paying applicable duties. We help you save time and money by keeping track of changing regulations to establish and maintain your IMMEX obligations.
                </p>
                <p class="small-paragraph-clean">
                    Take advantage of your IMMEX program! & avoid cancellation issues!
                </p>
            </div>
            <div class="col-md-6 order-0 text-center mb-3">
                <img width="547" height="531" class="img-fluid" src="{{ asset('v1/img/services/aux-01-3.png') }}" alt="IMMEX">
            </div>
        </div>
        <div class="row mb-5 align-items-center">
            <div class="col-md-6 order-1 order-md-0">
                <h3>Authorized Economic Operator AEO (OEA)</h3>
                <p class="small-paragraph-clean">
                    Mexico AEO certification constitutes proof of organizational health and process integrity. We guide you through self-assessment, application and operation so your business can benefit from OEA.
                </p>
                <p class="small-paragraph-clean">
                    Work in a simplified and secure process!
                </p>
            </div>
            <div class="col-md-6 order-0 order-md-1 text-center mb-3">
                <img width="547" height="531" class="img-fluid" src="{{ asset('v1/img/services/aux-02.png') }}" alt="Authorized Economic Operator AEO (OEA)">
            </div>
        </div>
        <div class="row mb-5 align-items-center">
            <div class="col-md-6 order-1">
                <h3>Trade Security Services (TSS)</h3>
                <p class="small-paragraph-clean">
                    Companies that import or export needs to have Knowledge, Controls, Processes, Training, Reviews and Audits to allow minimize risks for not complying with applicable regulations; fraud prevention and forced labor policies.
                </p>
                <p class="small-paragraph-clean">
                    In GoProTrade we can work to arm your Trade Agenda!
                </p>
                <p class="small-paragraph-clean">
                    Trade with Confidence! Strategically! To Growth your Business!
                </p>
            </div>
            <div class="col-md-6 order-0 text-center mb-3">
                <img width="547" height="531" class="img-fluid" src="{{ asset('v1/img/services/aux-03.png') }}" alt="Trade Security Services (TSS)">
            </div>
        </div>
        <div class="row mb-5 align-items-center">
            <div class="col-md-6 order-1 order-md-0">
                <h3>Americas Samples Management, Demos & Prototypes</h3>
                <p class="small-paragraph-clean">
                    Sample management is a part of process control, one of the essentials of a quality management system. The quality of the work a laboratory produces is only as good as the quality of the samples it uses for testing; the right process in his deployment, use, distribution and end of life (EOL) processes can prevent to risk IP and other legal issues.
                </p>
                <p class="small-paragraph-clean">
                    In GoProTrade we can handled your Samples, Demos and Prototypes!
                </p>
            </div>
            <div class="col-md-6 order-0 order-md-1 text-center mb-3">
                <img width="547" height="531" class="img-fluid" src="{{ asset('v1/img/services/aux-04-2.png') }}" alt="Americas Samples Management, Demos & Prototypes">
            </div>
        </div>
        <div class="row mb-5 align-items-center">
            <div class="col-md-6 order-1">
                <h3>Solutions that work together!<br>Import & Export with the Experts!</h3>
                <p class="small-paragraph-clean">
                    <strong>Trade Compliance within a Cost Saving Environment!</strong><br>
                    The increasing of your import & export operations reflects more complexity in your supply chain. In GoProTrade we have services your company needs to keep your import & export shipments moving from Mexico on time and in compliance.
                </p>
            </div>
            <div class="col-md-6 order-0 text-center mb-3">
                <img width="547" height="531" class="img-fluid" src="{{ asset('v1/img/services/aux-05.png') }}" alt="Import & Export with the Experts">
            </div>
        </div>
    </section>

    <div class="featured d-flex justify-content-center align-items-center my-5">
        <div class="star">
            <p class="text-center">
                The bigger the import/export operation, the more complex the supply chain.<br>
                <strong>We have the solutions you need to keep your shipments moving in and out of Mexico on time and in compliance.</strong>
            </p>
        </div>
    </div>

    <section id="main-features" class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4 col-same-height-386">
                <h4 class="gradient text-center">Exporter</h4>
                <div class="text-center">
                    <img width="200" height="122" class="img-fluid" src="{{ asset('v1/img/services/feat-01.png') }}" alt="Exporter">
                </div>
                <ul class="small orange-bullet">
                    <li>Document management</li>
                    <li>Restricted party screening</li>
                    <li>Export classification</li>
                    <li>Export controls</li>
                </ul>
                <img width="290" height="18" class="img-fluid pos-abs-bottom-0" src="{{ asset('v1/img/services/footer.png') }}" alt="division line">
            </div>
            <div class="col-md-3 mb-4 col-same-height-386">
                <h4 class="gradient text-center">Secure Transportation and Documentation</h4>
                <div class="text-center">
                    <img width="200" height="122" class="img-fluid" src="{{ asset('v1/img/services/feat-02.png') }}" alt="Secure Transportation and Documentation">
                </div>
                <ul class="small orange-bullet">
                    <li>Freight booking and pre-shipment process</li>
                    <li>Carrier management</li>
                    <li>Shipment tracking</li>
                    <li>P.O. management</li>
                    <li>Determination of licenses and permits</li>
                </ul>
                <img width="290" height="18" class="img-fluid pos-abs-bottom-0" src="{{ asset('v1/img/services/footer.png') }}" alt="division line">
            </div>
            <div class="col-md-3 mb-4 col-same-height-386">
                <h4 class="gradient text-center">Shipping</h4>
                <div class="text-center">
                    <img width="200" height="122" class="img-fluid" src="{{ asset('v1/img/services/feat-03.png') }}" alt="Shipping">
                </div>
                <ul class="small orange-bullet">
                    <li>Ocean freight</li>
                    <li>LCL express services</li>
                    <li>Air freight</li>
                    <li>Ground freight</li>
                </ul>
                <img width="290" height="18" class="img-fluid pos-abs-bottom-0" src="{{ asset('v1/img/services/footer.png') }}" alt="division line">
            </div>
            <div class="col-md-3 mb-4 col-same-height-386">
                <h4 class="gradient text-center">Customs</h4>
                <div class="text-center">
                    <img width="200" height="122" class="img-fluid" src="{{ asset('v1/img/services/feat-04.png') }}" alt="Customs">
                </div>
                <ul class="small orange-bullet">
                    <li>Mexican custom brokerage</li>
                    <li>Payment of duties and taxes (D&T) process within your bank</li>
                    <li>Custom audit assistance</li>
                </ul>
                <img width="290" height="18" class="img-fluid pos-abs-bottom-0" src="{{ asset('v1/img/services/footer.png') }}" alt="division line">
            </div>
            <div class="col-md-3 mb-4 col-same-height-386">
                <h4 class="gradient text-center">Transportation services</h4>
                <div class="text-center">
                    <img width="200" height="122" class="img-fluid" src="{{ asset('v1/img/services/feat-05.png') }}" alt="Transportation services">
                </div>
                <ul class="small orange-bullet">
                    <li>Cross docking</li>
                    <li>Ground transportation</li>
                    <li>Reverse logistics</li>
                    <li>KPI metrics</li>
                </ul>
                <img width="290" height="18" class="img-fluid pos-abs-bottom-0" src="{{ asset('v1/img/services/footer.png') }}" alt="division line">
            </div>
            <div class="col-md-3 mb-4 col-same-height-386">
                <h4 class="gradient text-center">Importer Trade compilance</h4>
                <div class="text-center">
                    <img width="200" height="122" class="img-fluid" src="{{ asset('v1/img/services/feat-06.png') }}" alt="Importer Trade compilance">
                </div>
                <ul class="small orange-bullet">
                    <li>Product classification</li>
                    <li>Duty minimization</li>
                    <li>Free trade program services</li>
                    <li>In-house training</li>
                    <li>Trade management</li>
                    <li>Management and rebuild of Annex 24</li>
                    <li>NOMs</li>
                </ul>
                <img width="290" height="18" class="img-fluid pos-abs-bottom-0" src="{{ asset('v1/img/services/footer.png') }}" alt="division line">
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        .orange-bullet{
            list-style: none;
        }
        .orange-bullet > li:before{
            content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
            color: #E4B04B; /* Change the color */
            font-weight: bold; /* If you want it to be bold */
            display: inline-block; /* Needed to add space between the bullet and the text */
            width: 1em; /* Also needed for space (tweak if needed) */
            margin-left: -1em
        }
    </style>
@endpush
