import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AppComponent } from './app.component';
import {RouterModule, RouterOutlet, Routes} from "@angular/router";

const routes: Routes = [
  {
    path: '',
    component: AppComponent,
    children: [
      {
        path: '',
        loadChildren: () => import('./opportunities/opportunities.module').then(m => m.OpportunitiesModule)
      }
    ]
  },
];

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    CommonModule,
    RouterOutlet,
    RouterModule.forChild(routes)
  ]
})
export class AppModule { }
