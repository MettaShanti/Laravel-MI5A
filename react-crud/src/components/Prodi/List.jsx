import React, {useEffect, useState} from "react"
import axios from "axios"
import { NavLink } from "react-router-dom";
import Swal from "sweetalert2"; // Import SweetAlert2

export default function List(){
    //state prodi
    const [prodi, setProdi] = useState([]);
    //useeffect

    useEffect( () => {
        axios
        .get("https://academic-mi5a.vercel.app/api/api/prodi")
        .then( response => {
            console. log(response);
            setProdi(response.data.data)//disesuaikan dari inspect
        })
    }, [] )

// Fungsi untuk menghapus fakultas berdasarkan ID dengan konfirmasi SweetAlert2
const handleDelete = (id, nama) => {
    Swal.fire({
      title: "Are you sure?",
      text: `You won't be able to revert this! Prodi: ${nama}`,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        // Lakukan penghapusan jika dikonfirmasi
        axios
          .delete(`https://academic-mi5a.vercel.app/api/api/prodi/${id}`)
          .then((response) => {
            // Hapus fakultas dari state setelah sukses dihapus dari server
            setProdi(prodi.filter((data) => data.id !== id));
            // Tampilkan notifikasi sukses
            Swal.fire("Deleted!", "Your data has been deleted.", "success");
          })
          .catch((error) => {
            console.error("Error deleting data:", error); // Menangani error
            Swal.fire(
              "Error",
              "There was an issue deleting the data.",
              "error"
            );
          });
      }
    });
  };
    return (
        <>
        <h2>List Prodi</h2>
         <NavLink to="/prodi/create" className="btn btn-primary mb-3">Create</NavLink>
        <table className="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kaprodi</th>
                    <th>Singkatan</th>
                    <th>Fakultas</th>
                </tr>
            </thead>
            <tbody>
                {prodi.map( (data) => (
                <tr key={data.id}>
                    <td>{data.nama}</td>
                    <td>{data.kaprodi}</td>
                    <td>{data.singkatan}</td>
                    <td>{data.fakultas.nama}</td>
                    <td>
                    <NavLink to={`/prodi/edit/${data.id}`}
                                className="btn btn-warning">Edit</NavLink>
                    <button onClick={() => handleDelete(data.id, data.nama)}
                                className="btn btn-danger"> Delete</button>
                  </td>
                </tr>
                ) )}
            </tbody>
        </table>
        </>
    )
}