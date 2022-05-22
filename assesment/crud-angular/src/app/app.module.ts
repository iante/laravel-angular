import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {RouterModule, Routes} from '@angular/router';

import { AppComponent } from './app.component';
import { StudentsComponent } from './components/students/students.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { StudentEditComponent } from './components/student-edit/student-edit.component';


const appRoutes: Routes = [

 {path:'',component:StudentsComponent
 
}, 

{path:'edit/:id',component:StudentEditComponent}

]

@NgModule({
  declarations: [
    AppComponent,
    StudentsComponent,
    NavbarComponent,
    StudentEditComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot(appRoutes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
