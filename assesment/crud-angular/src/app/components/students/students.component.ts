import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/service/data.service';
import { Student } from 'src/app/student';

@Component({
  selector: 'app-students',
  templateUrl: './students.component.html',
  styleUrls: ['./students.component.css']
})
export class StudentsComponent implements OnInit {

   //Creating a students array
   students:any;
      
   //Creating a new Student Record using the student model
   student = new Student();

  //Importing Data Service In order to fetch data from the API
  constructor(private dataService:DataService) { }

  ngOnInit(): void {
    //Functions Creates should be called here
    this.getEmployeesData();
  }

  //Creating function to fetch all employees data
  getEmployeesData(){
    this.dataService.getData().subscribe(res => {

      //Passing the response got from API to students array 
      this.students = res;
    });

    
  }

  //Function for handling form submission on creation of a new student record

  insertData(){
    this.dataService.insertData(this.student).subscribe(res=>{
     this.getEmployeesData();
    });
  }

  deleteData(id: string){
    this.dataService.deleteData(id).subscribe(res=>{
      this.getEmployeesData();
  });

}

updateData(id: string){
  this.getEmployeesData();
}

}
