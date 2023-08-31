<div class="d-flex justify-content-center align-items-center h-100">
    <form class="row g-3" action="{{ route('university.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6"><label class="form-label" for="inputEmail4">รหัสนักศึกษา</label><input name="empID" class="form-control" id="inputEmail4" type="text" placeholder="รหัสนักศึกษา "/></div>
        <div class="col-md-6"></div>
        <div class="col-md-6"><label class="form-label" for="inputPassword4">Password</label><input name="passWord" class="form-control" id="inputPassword4" type="password" placeholder="********** "  /></div>
        <div class="col-6"></div>
        <div class="col-6"><label class="form-label" for="inputAddress">ชื่อ-สกุล </label><input name="empName" class="form-control" id="inputAddress" type="text" placeholder="ชื่อ-สกุล" required /></div>
        <div class="col-6"><label class="form-label" for="inputAddress2">สาขา</label><input name="major" class="form-control" id="inputAddress2" type="text" placeholder="สาขา" required /></div>
        <div class="col-md-6"><label class="form-label" for="inputCity">เบอร์โทร</label><input name="tel" class="form-control" id="inputCity" type="text" placeholder="0XX-XXX-XXXX "required/></div>
        <div class="col-md-4"><label class="form-label" for="inputemail">อีเมล์</label><input name="email" class="form-control" id="inputemail" type="email" placeholder="SXXXXXXXXXXX@sau.ac.th "required/></div>
        
        <div class="col-12"><button class="btn btn-primary float-left" type="submit">ลงทะเบียน</button><button class="ms-3 btn btn-danger" type="reset">ยกเลิก</button></div>
    </form>
</div>