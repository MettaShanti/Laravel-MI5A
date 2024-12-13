import React,{useEffect, useState} from "react"
import axios from "axios"
import { NavLink } from "react-router-dom";

export default function List(){
    //state prodi
    const [mahasiswa, setMahasiswa] = useState([]);

    //akses api
    useEffect( () => {
        axios
        .get("https://academic-mi5a.vercel.app/api/api/mahasiswa")
        .then( (response)=> {
            console.log(response);
            setMahasiswa(response.data.data)// reault diganti(disesuaikan inspect)
        })
    }, [])

    return(
        <>
            <h2>List mahasiswa</h2>
            <NavLink to="/mahasiswa/create" className="btn btn-primary mb-3">Create</NavLink>
            <table className="table">
                <thead>
                    <tr>
                    <th>Nama</th>
                    <th>Npm</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Prodi</th>
                    </tr>
                </thead>
                <tbody>
                    {mahasiswa.map( (data) => (
                        <tr key={data.id}>
                        <td>{data.nama}</td>
                        <td>{data.npm}</td>
                        <td>{data.tanggal_lahir}</td>
                        <td>{data.tempat_lahir}</td>
                        <td>{data.hp}</td>
                        <td>{data.alamat}</td>
                        <td>{data.prodi_id}</td>
                    </tr>
                    ) )}
                </tbody>
            </table>
        </>
    )
}