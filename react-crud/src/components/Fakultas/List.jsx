import React,{useEffect, useState} from "react"
import axios from "axios"

export default function List(){
    //state fakultas
    const [fakultas, setFakultas] = useState([]);

    //akses api
    useEffect( () => {
        axios
        .get("https://academic-mi5a.vercel.app/api/api/fakultas")
        .then( (response)=> {
            console.log(response);
            setFakultas(response.data.data)// reault diganti(disesuaikan inspect)
        })
    }, [])

    return(
        <>
            <h2>List Fakultas</h2>
            <table className="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    {fakultas.map( (data) => (
                        <tr key={data.id}>
                            <td>{data.nama}</td>
                        </tr>
                    ) )}
                </tbody>
            </table>
        </>
    )
}