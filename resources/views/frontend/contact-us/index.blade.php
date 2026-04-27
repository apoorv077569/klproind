@include('import.header')

<!-- Start Page Title Area -->
<section class="page-title-area uk-page-title">
    <div class="uk-container">
        <h1>Contact</h1>
        <ul>
            <li><a href="{{route('frontend.home')}}">Home</a></li>
            <li>Contact</li>
        </ul>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Contact Area -->
@include('import.contact_form')
<!-- End Contact Area -->

@include('import.footer')