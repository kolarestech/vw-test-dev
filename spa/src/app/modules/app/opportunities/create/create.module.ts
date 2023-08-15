import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CreateComponent } from './create.component';
import {RouterModule, Routes} from "@angular/router";
import {NgMultiSelectDropDownModule} from "ng-multiselect-dropdown";
import {NgSelectModule} from "@ng-select/ng-select";
import {FormsModule} from "@angular/forms";


const routes: Routes = [
  {
    path: '',
    component: CreateComponent,
  },
];
@NgModule({
  declarations: [
    CreateComponent
  ],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    NgMultiSelectDropDownModule,
    NgSelectModule,
    FormsModule
  ]
})
export class CreateModule { }
