import { Component, OnInit } from '@angular/core';
import {OpportunitiesService} from "../../../../services/opportunities.service";
import {ModalDismissReasons, NgbModal} from "@ng-bootstrap/ng-bootstrap";
import {ToastrService} from "ngx-toastr";

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent {
  opportunities: any = []
  productsInEvidence: any = [];
  closeResult = '';
  totalProductsPrice: Number = 0;
  opportunityInEvidence: string = '';

  constructor(
    private _opportunitiesService: OpportunitiesService,
    private _modalService: NgbModal,
    private _toastrService: ToastrService
  ) {
  }

  ngOnInit() {
    this.list();
  }

  list() {
    this._opportunitiesService.index().subscribe(
      response => {
        console.log(response);
        this.opportunities = response.data;
      }
    );
  }

  openProducts(content: any, products: any) {
    this.productsInEvidence = products
    this.somarPrecoProdutos();
    this._modalService.open(content, { ariaLabelledBy: 'modal-basic-title', fullscreen: true }).result.then(
      (result) => {
        this.closeResult = `Closed with: ${result}`;
      },
      (reason) => {
        this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
      },
    );
  }

  openApprove(content: any, opportunityIdentify: string) {
    this.opportunityInEvidence = opportunityIdentify
    this._modalService.open(content, { ariaLabelledBy: 'modal-basic-title'}).result.then(
      (result) => {
        this.closeResult = `Closed with: ${result}`;
      },
      (reason) => {
        this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
      },
    );
  }

  openReject(content: any, opportunityIdentify: string) {
    console.log(opportunityIdentify);
    this.opportunityInEvidence = opportunityIdentify
    this._modalService.open(content, { ariaLabelledBy: 'modal-basic-title'}).result.then(
      (result) => {
        this.closeResult = `Closed with: ${result}`;
      },
      (reason) => {
        this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
      },
    );
  }

  approveOpportunity() {
    this._opportunitiesService.approve(this.opportunityInEvidence).subscribe(
      response => {
        this._toastrService.success("A oportunidade foi Aprovada!")
        this._modalService.dismissAll();
        this.list();
      }
    );
  }

  rejectOpportunity() {
    this._opportunitiesService.reject(this.opportunityInEvidence).subscribe(
      response => {
        this._toastrService.success("A oportunidade foi Rejeitada!")
        this._modalService.dismissAll();
        this.list();
      }
    );
  }

  private getDismissReason(reason: any): string {
    if (reason === ModalDismissReasons.ESC) {
      return 'by pressing ESC';
    } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
      return 'by clicking on a backdrop';
    } else {
      return `with: ${reason}`;
    }
  }

  somarPrecoProdutos () {
    let sum: any = this.productsInEvidence.reduce(function(accumulator: any, object: any){
      return accumulator + parseFloat(object.price)
    },0);

    this.totalProductsPrice = sum;
  }

  protected readonly JSON = JSON;
}
