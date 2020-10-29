<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('demo','demo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard'); 
Route::get('/candidates','FrontendController@candidates')->name('candidates');
Route::post('empregister','EmployerRegisterController@employerRegister')->name('empregister');
Route::post('contactus', 'EmailController@contactus')->name('contact');

Route::get('/','FrontendController@index')->name('home');
Route::get('/jobs/create','JobController@create')->name('job.create');
Route::post('/jobs/create','JobController@store')->name('job.store');
Route::post('company/editjob','JobController@editjob')->name('editjob');
Route::post('/jobs/{id}/edit','JobController@update')->name('job.update');
Route::get('/jobs/my-job','JobController@myjob')->name('my.job');
Route::get('/jobs/{id}/{job}', 'FrontendController@job')->name('jobs.show');

Route::post('/applications/{id}','JobController@apply')->name('apply');
Route::get('/jobs/applications','JobController@applicant')->name('applicant');
Route::get('/jobs/alljobs','JobController@allJobs')->name('alljobs');
Route::get('/jobs','FrontendController@jobs')->name('jobs');
Route::get('candidate/{id}', 'FrontendController@candidate')->name('candidate.index');

//company 
Route::get('/company/{id}/{company}', 'FrontendController@company')->name('company.index');
Route::get('/company/dashboard','CompanyController@dashboard')->name('companydashboard');
Route::get('/company/jobs','CompanyController@jobs')->name('companyjobs');
Route::get('/company/shortlisted','CompanyController@shortlisted')->name('companyshortlisted');
Route::get('/company/postjob','CompanyController@postjob')->name('companypostjob');
Route::get('/company/changepassword','CompanyController@changepassword')->name('companychangepassword');
Route::post('/company/create','CompanyController@store')->name('companycreate');
Route::post('/company/socials','CompanyController@socials')->name('companysocials');
Route::post('/company/contacts','CompanyController@contacts')->name('companycontacts');
Route::post('/company/coverphoto','CompanyController@coverphoto')->name('cover.photo');
Route::post('/company/logo','CompanyController@companyLogo')->name('company.logo');
Route::post('/company/shortlist','CompanyController@shortlist')->name('shortlist');
Route::delete('company/deletejob/{id}/destroy/','JobController@delete')->name('deletejob');

Route::get('companies','FrontendController@companies')->name('companies');


//user profile
Route::get('user/dashboard','UserController@index')->name('user.profile');
Route::get('user/experience','UserController@experience')->name('userexperience');
Route::post('user/addexperience','UserController@education')->name('addexperience');
Route::post('user/editeducation','UserController@editeducation')->name('editeducation');
Route::post('user/editwork','UserController@editwork')->name('editwork');
Route::delete('user/deleteeducation/{id}/destroy/','UserController@deleteEducation')->name('deleteedu');
Route::delete('user/deletework/{id}/destroy/','UserController@deleteWork')->name('deletework');
Route::get('user/appliedjobs','UserController@appliedjobs')->name('userappliedjobs');
Route::get('user/changepassword','UserController@changepassword')->name('userchangepassword');
Route::post('user/profile/create','UserController@store')->name('profile.create');
Route::post('user/socials','UserController@socials')->name('socials');
Route::post('user/resume','UserController@resume')->name('resume');
Route::post('user/avatar','UserController@avatar')->name('avatar');
Route::post('user/changepassword','UserController@userchangepassword')->name('userchangepassword');
Route::get('/user/shortlisting','UserController@shortlisting')->name('shortlisting');


//employer view
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');

//category
Route::get('/category/{id}','CategoryController@index')->name('category.index');

//admin
Route::get('/dashboard','DashboardController@index')->name('dashboard')->middleware('admin');
Route::get('/dashboard/candidates','DashboardController@candidates')->name('admincandidates')->middleware('admin');
Route::get('/dashboard/companies','DashboardController@companies')->name('admincompanies')->middleware('admin');
Route::get('/dashboard/jobs','DashboardController@jobs')->name('adminjobs')->middleware('admin');
Route::get('dashboard/changepassword','DashboardController@changepassword')->name('changepassword');
Route::post('dashboard/changepassword','DashboardController@adminchangepassword')->name('adminchangepassword');
Route::get('/dashboard/categories','DashboardController@categories')->name('categories')->middleware('admin');
Route::post('/dashboard/createcat','CategoryController@store')->name('createcat')->middleware('admin');
Route::post('/dashboard/editcat','CategoryController@update')->name('editcat')->middleware('admin');
Route::delete('/dashboard/deletecat/{id}/destroy/','CategoryController@deletecat')->name('deletecat');

//Email Route
Route::post('/email/job', 'EmailController@send')->name('mail');
//End of email route

