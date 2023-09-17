@extends('site.v2.master.app')

@section('title', 'Our Company')
@section('description', '')
@section('image', asset('v1/img/nearshoring.png'))

@section('content')
    <section id="main" class="container mb-5">
        <div class="row mb-4">
            <div class="col-md-4 text-center">
                <img width="295" height="180" class="img-fluid" src="{{ asset('v1/img/goprotrade.svg') }}" alt="GoPro Trade MX Logo">
            </div>
            <div class="col-md-8">
                <h1 class="gradient">History</h1>
                <p class="small-paragraph-clean">
                    “GoProTrade” it’s a Business Unit of the company “GoPro Expeditions SA de CV”. Based in the city of Guadalajara; Started Operations in 2018 in South Mexico with the mission to provide local Tech Companies with outstanding Trade & Logistics services as to import and export fixed assets and raw material via Control Tower; Carrier and Customs Broker Operations Management; Trade Compliance Programs and other T&L Services.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <h2 class="text-start"><strong>Compliance</strong></h2>
                <p class="small-paragraph-clean">
                    Our policies, culture and procedures are periodically reviewed to guarantee the best experience for our clients. Regulations reviewed with experts in charge of monitoring compliance before, during and after customs clearance. We have a team of professionals to support our clients in the import and export processes as well in Customs Clearance and Trade Programs.
                </p>
                <p class="small-paragraph-clean">
                    We are also aware of the importance of carrying out our activity in accordance with ethical values. To this end, at GoPro Trade we are committed to developing an ethical and compliance culture; all of our collaborators being part of it. We have ethical channels with the clear objective of being able to know and detect any element that hinders the effectiveness of our Compliance Program; we have enabled as well our Code of Conduct.
                </p>
            </div>
            <div class="col-md-6 mb-4">
                <h2 class="text-start"><strong>Why to chose GoProTrade</strong></h2>
                <p class="small-paragraph-clean">
                    Near Shoring is reminding us the Trade Change Environment in conducting international business worldwide. In GoPro Trade we offer Customized Services and Expertise in Complying Trade & Logistics Procedures needed in your Company, via -Control Tower Solutions- Arming and Consolidating Teams, Vendors, Services, Processes-Programs and Projects in a Compliance and Cost Reduction Environment. We administrate your Trade and Logistics Operations; having professionals in serving to your Company.
                </p>
            </div>
            <div class="col-md-6 mb-4">
                <h2 class="text-start"><strong>How we work</strong></h2>
                <p class="small-paragraph-clean">
                    We arm your Trade & Logistics Team to connect and work within our GoProTrade Control Tower Programs according to your needs, setting up the correct processes and controls to enhance your supply chain; administrating resources (people) carriers and customs brokers operations in a single point of contact. The direction is to have a best in class agenda for your Trade and Logistics Programs and Procedures. We have -in house- modality (staff augmentation) to work closely within our customers in your company facilities as required.
                </p>
            </div>
            <div class="col-md-6 mb-4">
                <h2 class="text-start"><strong>Vision and Values</strong></h2>
                <p class="small-paragraph-clean">
                    In GoProTrade will deliver financial returns by providing differentiated and valued service to our customers through our integrated control tower services including customs brokerage, trade compliance and traffic services within our business partners. Our customers and our employees are our most important assets. We will always strive to deliver outstanding quality and operational excellence vision to ensure we attract service and retain both customers and employees. Our core values set the basis for the way we meet our business objectives, the way we work with each other and the way we interact with customers, vendors, employees and others. Some of our values:
                </p>
                <ol class="small">
                    <li>Keep GoProTrade and Customers Legal.</li>
                    <li>Customer Service is our customer focus mindset, through efficient, responsive and innovative services and solutions.</li>
                    <li>Diversity culture is how we include and deliver the best of all of us.</li>
                </ol>
            </div>
            <div class="col-md-6">
                <h2 class="text-start"><strong>Social Responsibility</strong></h2>
                <p class="small-paragraph-clean">
                    Through team activities and volunteering, we nurture a positive workplace, and build our Employees experience and skills. We encourage learning and growth. This is some of our items:
                </p>
                <ol class="small">
                    <li>Our Communities, giving back to them.</li>
                    <li>Our Employees, investing in our future.</li>
                    <li>Our Environment, recycling programs, reducing paper use through automation and imaging.</li>
                </ol>
            </div>
        </div>
    </section>
@endsection
