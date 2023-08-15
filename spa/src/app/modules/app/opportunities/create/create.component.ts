import { Component, OnInit } from '@angular/core';
import {ToastrService} from "ngx-toastr";
import {OpportunitiesService} from "../../../../services/opportunities.service";
import {ClientsService} from "../../../../services/clients.service";
import {ProductsService} from "../../../../services/products.service";
import {SellersService} from "../../../../services/sellers.service";
import {Product} from "../../../../interfaces/product";
import {Client} from "../../../../interfaces/client";
import {Seller} from "../../../../interfaces/seller";
import {Opportunity} from "../../../../interfaces/opportunity";
import {Router} from "@angular/router";
import {AuthService} from "../../../../services/auth.service";

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.scss']
})
export class CreateComponent {
  products: Product[] = [];
  clients: Client[] = [];
  opportunity: any = {}

  constructor(
    private _toastService : ToastrService,
    private _opportunityService: OpportunitiesService,
    private _clientService: ClientsService,
    private _productService: ProductsService,
    private _routerNavigate: Router,
    private _authService: AuthService
  ) {

  }

  ngOnInit() {
    this.getProducts();
    this.getClients();
  }

  getProducts() {
    this._productService.index().subscribe(
      response => {
        this.products = response.data;
      }
    )
  }

  getClients() {
    this._clientService.index().subscribe(
      response => {
        this.clients = response.data;
      }
    )
  }

  store() {
    let loggedUser = this._authService.getLoggedUser();
    this.opportunity.user_identify = loggedUser.uuid;
    this.opportunity.client_identify = this.opportunity.client_identify.uuid
    let formattedProducts: any = [];
    this.opportunity.products.map((product: any) => {
      formattedProducts.push({
        product_identify : product.uuid
      });
    });
    this.opportunity.products = formattedProducts;
    //console.log(this.opportunity.products);
    this._opportunityService.store(this.opportunity).subscribe(
      response => {
        this._toastService.success("A oportunidade foi criada com sucesso!");
        this._routerNavigate.navigate(["app"]);
      }, error => {
        console.log(error);
      }
    );
  }
}
