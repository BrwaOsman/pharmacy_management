<!-- need to remove -->
<div class="nav1">
<li class="nav-item mb-4">
    <a href="{{ route('home') }}" class="nav-link active radius-20 ">
        <i class="nav-icon ion-bag"></i>
    <p>Sale</p>
    </a>
</li>
<li class="nav-item mb-4">
    <a href="{{ route('sellers') }}" class="nav-link active radius-20">
        <i class="nav-icon ion-clipboard"></i>
        <p>Sellers</p>
    </a>
</li>
<li class="nav-item mb-4">
    <a href="{{ route('buy') }}" class="nav-link active radius-20">
        <i class="nav-icon ion-ios-cart-outline"></i>
        <p>Buy</p>
    </a>
</li>
<li class="nav-item mb-4">
    <a href="{{ route('expire') }}" class="nav-link active radius-20">
        <i class="nav-icon ion-ios-stopwatch-outline"></i>
        <p>Expire</p>
    </a>
</li>
<li class="nav-item mb-4">
    <a href="{{ route('debtlist') }}" class="nav-link active radius-20">
        <i class="nav-icon ion-ios-list-outline"></i>
        <p>Debt List</p>
    </a>
</li>
<li class="nav-item mb-4">
    <a href="{{ route('notleft') }}" class="nav-link active radius-20">
        <i class="nav-icon ion-battery-empty"></i>
        <p>Not Left</p>
    </a>
</li>
<li class="nav-item mb-4">
    <a href="{{ route('supplier') }}" class="nav-link active radius-20 ">
        <i class="nav-icon ion-android-bus"></i>
        <p>Supplier</p>
    </a>
</li> 
<li class="nav-item mb-4">
    <a href="{{ route('Casher') }}" class="nav-link active radius-20 bg-info">
        <i class="nav-icon ion-ios-person-outline"></i>
        <p class="text-center">Casher</p>
    </a>
</li>
<li class="nav-item mb-4">
    <a href="{{ route('profit') }}" class="nav-link active radius-20 bg-info">
     
        <i class="fas fa-hand-holding-usd nav-icon"></i>
        <p class="text-center">Profit</p>
    </a>
</li>
</div>
<style>
   .nav1 li a{
        background-color: #17A2B8 !important;
        font-size: 18px;
        text-align: center !important;
    }
    .nav1 li a i{
        float: left;
    }

</style>