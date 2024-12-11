import React,{useEffect, useState} from "react"
import axios from "axios"

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
            <table className="table">
                <thead>
                    <tr>
                    <th>Nama</th>
                    <th>Npm</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    {mahasiswa.map( (data) => (
                        <tr key={data.id}>
                        <td>{data.nama}</td>
                        <td>{data.npm}</td>
                        <td>{data.email}</td>
                        <td>{data.hp}</td>
                        <td>{data.alamat}</td>
                    </tr>
                    ) )}
                </tbody>
            </table>
        </>
    )
}