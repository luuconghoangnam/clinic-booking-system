<?php
class Mclass_dr{

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
	
	
	function exist_director($username){
			$conn = $this->connDB();
			$sql = "select * from director where username = '$username'";
			$result = mysqli_query($conn ,$sql);
			$existDirector = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $existDirector; 	
		}

	function multipleFunc($sql){
			$conn = $this->connDB();
			$result = mysqli_query($conn, $sql);
			mysqli_close($conn);
			return $result;
		}

	function show_info_director($id_director){
			$conn = $this->connDB();
			$sql = "select * from director where id_director = '$id_director'";
			$result = mysqli_query($conn ,$sql);
			$director = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $director;	
		}
		
	function show_all_doctor($sql){
			$conn = $this->connDB();
			$result = mysqli_query($conn ,$sql);
			$doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $doctors;
	}

	function exist_doctor($username){
			$conn = $this->connDB();
			$sql = "select * from doctor where username = '$username'";
			$result = mysqli_query($conn ,$sql);
			$existDoctor = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $existDoctor;
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
	function show_tin_tuc(){
			$conn = $this->connDB();
			$sql ="select * from tintuc";
			$result = mysqli_query($conn ,$sql);
			$tintuc = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $tintuc;
	}

	function show_detail_tin_tuc($id_tintuc){
			$conn = $this->connDB();
			$sql ="select * from tintuc where id_tintuc = '$id_tintuc' ";
			$result = mysqli_query($conn,$sql);
			$tintuc = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $tintuc;
	}

	function show_detail_tin_tuc_bytitle($title){
			$conn = $this->connDB();
			$sql ="select * from tintuc where title = '$title' ";
			$result = mysqli_query($conn ,$sql);
			$tintuc = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $tintuc;
	}		
}
  
?>