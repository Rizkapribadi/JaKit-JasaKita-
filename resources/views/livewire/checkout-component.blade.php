
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @foreach ($users as $user)
                @if($user->name==NULL || $user->address==NULL || $user->phoneNumber==NULL || $user->province_id==NULL || $user->regency_id==NULL)
                    @livewire('user.user-profil-component')
                @else
                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            <h4 class="title-box">Informasi Pembeli</h4>
                            <p class="summary-info"><span class="title">{{ $user->name }}</span></p>
                            <p class="summary-info"><span class="title">{{ $user->phoneNumber }}</span></p>
                        
                        </div>
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Alamat Lengkap</h4>
                            <p class="summary-info"><span class="title">{{ $user->address }},</span></p>
                            <p class="summary-info"><span class="title">{{ $user->regency->name }},</span></p>
                            <p class="summary-info"><span class="title">{{ $user->province->name}}</span></p>
                        </div>
                    </div>
            
            <div class="row">
                <div class="col-md-12">
            <form wire:submit.prevent="placeOrder">
                    <div class="wrap-address-billing">  
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                    <span>Jasa diantar ke rumah?</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
           
            @if($ship_to_different)
            <div class="col-md-12">
                <div class="wrap-address-billing">
                    <h3 class="box-title">Alamat Pengantaran Jasa</h3>
                   <div class="billing-address">
                        <p class="row-in-form">
                            <label for="fname">Name<span>*</span></label>
                            <input type="text" name="fname" value="" placeholder="Your name" wire:model="s_name">
                            @error('s_name') <span class="text-danger">{{ $message }}</span>@enderror
                        
                        </p>
                        <p class="row-in-form">
                            <label for="phone">Phone number<span>*</span></label>
                            <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_phoneNumber">
                            @error('s_phoneNumber') <span class="text-danger">{{ $message }}</span>@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
                            @error('s_email') <span class="text-danger">{{ $message }}</span>@enderror
                        </p>
                        
                        <p class="row-in-form">
                            <label for="add">Address:</label>
                            <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_address">
                            @error('s_address') <span class="text-danger">{{ $message }}</span>@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="country">Province<span>*</span></label>
                            <select  wire:model.lazy="selectedProvince2" class="form-control" wire:model="s_province_id">
                                <option selected="selected" value="">Choose province</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @error('province_id')<p class="text-danger">{{ $message }}</p>@enderror
                        </p>
                        @if(!is_null($selectedProvince2))   
                        <p class="row-in-form">
                            <label for="city">Regency<span>*</span></label>
                            <select class="form-control" wire:model="s_regency_id">
                                <option selected="selected" value="">Choose Regency</option>
                                @foreach($regencies as $regency)
                                    <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                @endforeach
                            </select>
                            @error('s_regency_id')<p class="text-danger">{{ $message }}</p>@enderror
                        </p>
                        @endif
                       
                    </div>
                </div>
            </div>
            @endif
        </div>
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Metode Pembayaran</h4>
                  
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmethod">
                            <span>Cash On Delivery</span>
                            <span class="payment-desc">Order Now Pay on Delivery</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmethod">
                            <span>Debit / Credit Card</span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmethod">
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
                        @error('paymentmethod') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    @if(Session::has('checkout'))
                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{ Session::get('checkout')['total'] }}</span></p>
                    @endif
                    <button type="submit" class="btn btn-medium">Place order now</button>
                </div>
                
                <div class="summary-item shipping-method">
                    <div class="choose-payment-methods">
                    <h4 class="title-box f-title">Jasa Pengiriman</h4>
                    <p class="summary-info"><span class="title">0 ongkir</span></p>
                    <p class="summary-info"><span class="title">Fixed $0</span></p>
                </div>
                </div>
            </div>
           
            @endif
            @endforeach
    </form>
        </div><!--end main content area-->
    </div><!--end container-->
  
</main>
