import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OpportunitiesComponent } from './opportunities.component';
import {RouterModule, RouterOutlet, Routes} from "@angular/router";

const routes: Routes = [
  {
    path: '',
    component: OpportunitiesComponent,
    children: [
      {
        path: '',
        loadChildren: () => import('./list/list.module').then(m => m.ListModule)
      },
      {
        path: 'create',
        loadChildren: () => import('./create/create.module').then(m => m.CreateModule)
      }
    ]
  },
];

@NgModule({
  declarations: [
    OpportunitiesComponent
  ],
  imports: [
    CommonModule,
    RouterOutlet,
    RouterModule.forChild(routes)
  ]
})
export class OpportunitiesModule { }
