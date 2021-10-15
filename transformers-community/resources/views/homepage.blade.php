@extends('layouts.layout')

@section('title', 'Home')

@section('home', 'active')

@section('first-item')
<h1 class="text-center font-bold-slider">Life <span class="underline-thick">sucks</span> sometimes.</h1>
<h4 class="text-center font-bold-slider">Maar je staat er niet alleen voor.</h3>
<p class="text-center font-med-slider">De Transformers Community is er voor jongeren die zelfverzekerd willen zijn en tegenslagen omzetten in kracht.<br>We doen dit samen: zo leren we meer en helpen we elkaar om te groeien.</p>
@endsection

@section('second-item')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://static.wixstatic.com/media/e72157_db107074d02f49ee85c5460d7358244e~mv2.png/v1/fill/w_796,h_450,al_c,q_85,usm_0.66_1.00_0.01/e72157_db107074d02f49ee85c5460d7358244e~mv2.webp" class="rounded mx-auto d-block w-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="font-bold-slider">Lisa (24 jaar)</h5>
                <p class="font-med-slider">Ik kan mij zo gemakkelijk aanpassen aan anderen,<br>dat ik mijzelf op een gegeven moment kwijt was geraakt.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://static.wixstatic.com/media/e72157_eaee7f30427e47e0893180b6a2cac833~mv2.png/v1/fill/w_796,h_450,al_c,q_85,usm_0.66_1.00_0.01/e72157_eaee7f30427e47e0893180b6a2cac833~mv2.webp" class="rounded mx-auto d-block w-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="font-bold-slider">Elwin (29 jaar)</h5>
                <p class="font-med-slider">Ik ben opgegroeid met de overtuiging dat wat ik vond er toch niet toe deed,<br>maar ook dat wat ik voelde niet gehoord hoefde te worden.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://static.wixstatic.com/media/e72157_c01472345d2b461381e28a781dc86d9f~mv2.png/v1/fill/w_796,h_450,al_c,q_85,usm_0.66_1.00_0.01/e72157_c01472345d2b461381e28a781dc86d9f~mv2.webp" class="rounded mx-auto d-block w-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="font-bold-slider">Yasmine (22 jaar)</h5>
                <p class="font-med-slider">Ik heb gewoon bijna het gevoel dat het niet meer oké is om eerst jezelf op nummer één te zetten.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('third-item')
<div class="row">
            <div class="col-md-4">
                <div class="row" id="sidebar-content">
                    <div class="rounded" id="container-search">
                        <p class="text-start font-med-slider mt-2 text-uppercase">Zoeken</p>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Zoeken..." aria-label="Search">
                            <button class="btn rounded" type="submit" id="button-search">Search</button>
                        </form>
                    </div>
                    <div class="rounded" id="container-topic">
                        <p class="text-start font-med-slider mt-2 text-uppercase" style="padding: 0;">Onderwerpen</p>
                        <table class="table">
                            <tbody class="topic">
                                <tr>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 1
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 2
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 3
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 4
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 5
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 6
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 7
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 8
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="topic">
                                            Topic 9
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="rounded" id="container-topic">
                        <p class="text-start font-med-slider text-center mt-2 text-uppercase" style="padding: 0;font-size: 22px;">Stel je vraag anoniem</p>
                        <form>
                            <input class="form-control me-2 mb-2" type="text" placeholder="Naam..." aria-label="Search">
                            <input class="form-control me-2 mb-2" type="email" placeholder="Email..." aria-label="Search">
                            <input class="form-control me-2 mb-2" type="text" placeholder="Vraag..." aria-label="Search">
                            <button class="btn rounded w-100 mb-3" type="submit" id="button-search">Verstuur</button>
                        </form>
                    </div>
                </div>
@endsection