
@if($ads!=NULL)
<div>
    <div class="container" style="padding:30px 0;"> 
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        Iklan Anda
                     </div>
                </div>
            </div>
                <div class="panel-body">
                    <table class="table tabel-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jasa</th> 
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($ads as $advertisement)
                            <tr>
                              <td>1</td>
                              <td>{{ $advertisement->name }}</td>
                              <td>{{ $advertisement->jasa->name }}</td>
                              <td>{{ $advertisement->link }}</td>
                              <td></td>          
                              <td></td>
                              <td></td>
                              <td>
                                <a href="#" onclick="confirm('Are you sure, you want to delete this Advertisement?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAds({{ $advertisement->id }})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                              </td>
                          </tr>
                          @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('user.services') }}" class="btn btn-success pull-right">All Jasa</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        <form class="form-horizontal" wire:submit.prevent="addAds">

                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Tambah Iklan Untuk Jasa</h3>
                           <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="name">Name</label>
                                    <input type="text" name="fname" placeholder="Name" wire:model="name" />
        
                                
                                </p>
                                <p class="row-in-form">
                                    <label for="link">Link</label>
                                    <input type="text" name="phone" placeholder="Link" wire:model="link"/>
                        
                                </p>
                                <p class="row-in-form">
                                    <label for="image">Image</label>
                                    <input type="file" class="input-file" wire:model="image"/>
                                    @if($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120" />
                                    @endif
                                </p>
                                
                  
                                <p class="row-in-form">
                                    <label for="country">Hari Iklan ditampilkan</label>
                                    <select class="form-control" wire:model="day">
                                        <option selected="selected">Pilih Hari</option>
                                        <option value="1">1 Hari</option>
                                        <option value="2">2 Hari</option>
                                    </select>
                                </p>
            
                                    <select class="form-control" wire:model="status" style="display:none;">
                                        <option value="0" style="display:none;">Inactive</option>
                                        <option value="1" style="display:none;">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
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
                            @error('paymentmethod') <span class="text-danger">{{ $message }}</span>@enderror
                            <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">Rp100.000</span></p>
                        <button type="submit" class="btn btn-medium">Pesan Iklan</button>
                    </div>       
                </div>
                </div>
            </form>
        </div>
    </div>

@else

<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('user.services') }}" class="btn btn-success pull-right">All Jasa</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        <form class="form-horizontal" wire:submit.prevent="addAds">

                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Tambah Iklan Untuk Jasa</h3>
                           <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="name">Name</label>
                                    <input type="text" name="fname" placeholder="Name" wire:model="name" />
        
                                
                                </p>
                                <p class="row-in-form">
                                    <label for="link">Link</label>
                                    <input type="text" name="phone" placeholder="Link" wire:model="link"/>
                        
                                </p>
                                <p class="row-in-form">
                                    <label for="image">Image</label>
                                    <input type="file" class="input-file" wire:model="image"/>
                                    @if($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120" />
                                    @endif
                                </p>
                                
                  
                                <p class="row-in-form">
                                    <label for="country">Hari Iklan ditampilkan</label>
                                    <select class="form-control" wire:model="day">
                                        <option selected="selected">Pilih Hari</option>
                                        <option value="100000">1 Hari</option>
                                        <option value="200000">2 Hari</option>
                                    </select>
                                </p>
            
                                    <select class="form-control" wire:model="status" style="display:none;">
                                        <option value="0" style="display:none;">Inactive</option>
                                        <option value="1" style="display:none;">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
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
                            @error('paymentmethod') <span class="text-danger">{{ $message }}</span>@enderror
                            <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">Rp100.000</span></p>
                        <button type="submit" class="btn btn-medium">Pesan Iklan</button>
                    </div>       
                </div>
                </div>
            </form>
        </div>
    </div>
                 
@endif