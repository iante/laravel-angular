import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { DataService } from 'src/app/service/data.service';
import { Student } from 'src/app/student';

@Component({
  selector: 'app-student-edit',
  templateUrl: './student-edit.component.html',
  styleUrls: ['./student-edit.component.css']
})
export class StudentEditComponent implements OnInit {

  id:any;

  //data is an array that holds all the employee details returned from the API
  data:any;
  //Getting the Activated Route (Editing Student Records)

  student = new Student();
  constructor(private route:ActivatedRoute, private dataService:DataService) { }

  ngOnInit(): void {
   // console.log(this.route.snapshot.params['id'])

   //Getting the ID From the route
   this.id = this.route.snapshot.params['id'];
   this.getData();
  }

 //Get Specific Students Data Based on their ID
 getData(){
   this.dataService.getEmployeeById(this.id).subscribe(res=>{
     this.data = res;
     this.student = this.data;

   })
 }


 updateStudentRecord(){
   this.dataService.updateData(this.id, this.student).subscribe(res=>{
       
   });
 }

}
function id(id: any) {
  throw new Error('Function not implemented.');
}

