<?php
	
	class Mclass {

		// function connect đến CSDL
		function connDB(){
			// $conn = mysqli_connect("sql208.epizy.com", "epiz_25843573", 'nta69yDeGO', "epiz_25843573_medihome");
			$conn = mysqli_connect("localhost", "root", '', "tmdt");
			$conn -> set_charset("utf8");
			if(!$conn):
				echo 'lỗi không kết nối'.mysqli_error();
			else:
				return $conn;
			endif;
		}

		function exist_user($username){
			$conn = $this->connDB();
			$sql = "select * from user where username = '$username'";
			$result = mysqli_query($conn ,$sql);
			$existUser = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $existUser; 	
		}

		// function exist_doctor($username){
		// 	$conn = $this->connDB();
		// 	$sql = "select * from doctor where username = '$username'";
		// 	$result = mysqli_query($conn ,$sql);
		// 	$existDoctor = mysqli_fetch_assoc($result);
		// 	mysqli_free_result($result);
		// 	mysqli_close($conn);
		// 	return $existDoctor;
		// }

		function exist_email($email){
			$conn = $this->connDB();
			$sql = "select * from user where email = '$email'";
			$result = mysqli_query($conn ,$sql);
			$existEmail = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $existEmail;
		}

		function multipleFunc($sql){
			$conn = $this->connDB();
			$result = mysqli_query($conn, $sql);
			mysqli_close($conn);
			return $result;
		}

		function show_info($username){
			$conn = $this->connDB();
			$sql = "select * from user where username = '$username'";
			$result = mysqli_query($conn ,$sql);
			$user = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $user; 
		}
		function show_info_byid($id_user){
			$conn = $this->connDB();
			$sql = "select * from user where id_user = '$id_user'";
			$result = mysqli_query($conn ,$sql);
			$user = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $user; 
		}

		function show_info_doctor($id_doctor){
			$conn = $this->connDB();
			$sql = "select * from doctor where id_doctor = '$id_doctor'";
			$result = mysqli_query($conn ,$sql);
			$doctor = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $doctor;	
		}

		//show các bác sĩ thuộc 1 khoa,1 khu làm việc
		function show_doctor($id_khoa,$working_address){
			$conn = $this->connDB();
			$sql = "select * from doctor where id_khoa = '$id_khoa' and working_address = '$working_address' ";
			$result = mysqli_query($conn ,$sql);
			$doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $doctors;
		}

		function show_chuyen_khoa($id_doctor){
			$conn = $this->connDB();
			$sql = "select nameF from khoa a join doctor b on a.id_khoa = b.id_khoa  
								where id_doctor = '$id_doctor'";
			$result = mysqli_query($conn ,$sql);
			$chuyen_khoa = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $chuyen_khoa['nameF'];
		}

		//Phía bác sĩ được bệnh nhân hẹn
		function show_lich_hen($id_doctor){
			$conn = $this->connDB();
			$sql = "select * from phieukham where id_doctor = '$id_doctor' and chidan is NULL";
			$result = mysqli_query($conn ,$sql);
			$lichhen = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $lichhen; 
		}

		// lịch nghỉ bận dành cho bác sĩ 
		function show_lich_nghi($id_doctor){
			$conn = $this->connDB();
			$sql = "select * from lichnghi where id_doctor = '$id_doctor' order by ngaynghi ASC ";
			$result = mysqli_query($conn ,$sql);
			$lichnghi = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $lichnghi;
		}

		// Phía bệnh nhân xem lịch khám của mình
		function show_lich_kham($id_user){
			$conn = $this->connDB();
			$sql = "select * from phieukham where id_user = '$id_user' and chidan is NULL ";
			$result = mysqli_query($conn ,$sql);
			$lichkham = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $lichkham;
		}

		function show_lichsu_khambenh($id_user){
			$conn = $this->connDB();
			$sql = "select * from phieukham where id_user = '$id_user' and chidan is NOT NULL";
			$result = mysqli_query($conn ,$sql);
			$history = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $history;
		}

		//lịch sử chữa bệnh của bác sĩ đối với các bệnh nhân của mình 	
		// function show_lichsu_chuabenh($id_doctor){
		// 	$conn = $this->connDB();
		// 	$sql = "select * from phieukham where id_doctor = '$id_doctor' and chidan is NOT NULL ";
		// 	$result = mysqli_query($conn ,$sql);
		// 	$lichkham = mysqli_fetch_all($result, MYSQLI_ASSOC);
		// 	mysqli_free_result($result);
		// 	mysqli_close($conn);
		// 	return $lichkham;
		// }

		function show_toathuoc($id_phieukham){
			$conn = $this->connDB();
			$sql = "select * from thuoc where id_phieukham = '$id_phieukham' ";
			$result = mysqli_query($conn ,$sql);
			$toathuoc = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $toathuoc;
		}

 	}	
?>
