/* eslint-disable no-unused-vars */
// src/components/Fakultas/Create.jsx
import React, { useState } from "react"; // Import React dan useState untuk menggunakan state hooks
import axios from "axios"; // Import axios untuk melakukan HTTP request

export default function CreateMahasiswa() {
  // Inisialisasi state untuk menyimpan nama fakultas
  const [nama, setNama] = useState("");
  const [npm, setNpm] = useState("");
  const [tanggal_lahir, setTanggal] = useState("");
  const [tempat_lahir, setTempat] = useState("");
  const [email, setEmail] = useState("");
  const [hp, setHp] = useState("");
  const [alamat, setAlamat] = useState("");
  const [prodi, setProdi] = useState("");

  // Inisialisasi state untuk menyimpan pesan error
  const [error, setError] = useState("");
  // Inisialisasi state untuk menyimpan pesan sukses
  const [success, setSuccess] = useState("");

  // Fungsi yang akan dijalankan saat form disubmit
  const handleSubmit = async (e) => {
    e.preventDefault(); // Mencegah reload halaman setelah form disubmit
    setError(""); // Reset pesan error sebelum proses
    setSuccess(""); // Reset pesan sukses sebelum proses

    // Validasi input: jika namaFakultas kosong, set pesan error
    if (nama.trim() === "") {
      setError("Nama is required"); // Set pesan error jika input kosong
      return; // Stop eksekusi fungsi jika input tidak valid
    }
    
    if (npm.trim() === "") {
      setError("Npm is required"); // Set pesan error jika input kosong
      return; // Stop eksekusi fungsi jika input tidak valid
    }
    if (tanggal_lahir.trim() === "") {
      setError("tanggal is required"); // Set pesan error jika input kosong
      return; // Stop eksekusi fungsi jika input tidak valid
  }
  if (tempat_lahir.trim() === "") {
    setError("tempat  is required"); // Set pesan error jika input kosong
    return; // Stop eksekusi fungsi jika input tidak valid
}

    if (email.trim() === "") {
        setError("email is required"); // Set pesan error jika input kosong
        return; // Stop eksekusi fungsi jika input tidak valid
    }
    if (hp.trim() === "") {
      setError("hp is required"); // Set pesan error jika input kosong
      return; // Stop eksekusi fungsi jika input tidak valid
  }
  if (alamat.trim() === "") {
    setError("alamat is required"); // Set pesan error jika input kosong
    return; // Stop eksekusi fungsi jika input tidak valid
}
}
if (prodi.trim() === "") {
  setError("prodi is required"); // Set pesan error jika input kosong
  return; // Stop eksekusi fungsi jika input tidak valid
}

    try {
      // Melakukan HTTP POST request untuk menyimpan data fakultas
      const response = await axios.post(
        "https://academic-mi5a.vercel.app/api/api/mahasiswa", // Endpoint API yang dituju
        {
          nama: nama, // Data yang dikirim berupa objek JSON dengan properti 'nama'
          npm: npm,
          email: email,
          hp: hp,
          alamat: alamat
        }
      );

      // Jika response HTTP status 201 (Created), berarti berhasil
      if (response.status === 201) {
        // Tampilkan pesan sukses jika fakultas berhasil dibuat
        setSuccess("Mahasiswa created successfully!");
        setNama(""); // Kosongkan input form setelah sukses submit
      } else {
        // Jika tidak berhasil, tampilkan pesan error
        setError("Failed to create mahasiswa");
      }
    } catch (error) {
      // Jika terjadi error (misal masalah jaringan), tampilkan pesan error
      setError("An error occurred while creating mahasiswa");
    }
  };

  return (
    <div className="container mt-5">
      <h2 className="mb-4">Create Mahasiswa</h2>
      {/* Jika ada pesan error, tampilkan dalam alert bootstrap */}
      {error && <div className="alert alert-danger">{error}</div>}
      {/* Jika ada pesan sukses, tampilkan dalam alert bootstrap */}
      {success && <div className="alert alert-success">{success}</div>}
      {/* Form untuk mengisi nama fakultas */}
      <form onSubmit={handleSubmit}>
        {/* Tangani event submit dengan handleSubmit */}
        <div className="mb-3">
          <label className="form-label">
            Nama Mahasiswa
          </label>
          {/* Input untuk nama fakultas dengan class bootstrap */}
          <input
            type="text" className="form-control" id="nama"
            value={nama} // Nilai input disimpan di state namaFakultas
            onChange={(e) => setNama(e.target.value)} // Update state saat input berubah
            placeholder="Enter Mahasiswa Name" // Placeholder teks untuk input
          />
        </div>

        <div className="mb-3">
          <label className="form-label">
            NPM
          </label>
          {/* Input untuk nama nama dekan dengan class bootstrap */}
          <input
            type="text" className="form-control" id="npm"
            value={npm} // Nilai input disimpan di state namaFakultas
            onChange={(e) => setNpm(e.target.value)} // Update state saat input berubah
            placeholder="Enter NPM Name" // Placeholder teks untuk input
          />
        </div>

        <div className="mb-3">
          <label className="form-label">
            Tanggal
          </label>
          {/* Input untuk nama fakultas dengan class bootstrap */}
          <input
            type="text" className="form-control" id="tanggal_lahir"
            value={tanggal_lahir} // Nilai input disimpan di state namaFakultas
            onChange={(e) => setTanggal(e.target.value)} // Update state saat input berubah
            placeholder="Enter tanggal_lahir Name" // Placeholder teks untuk input
          />
        </div>

        <div className="mb-3">
          <label className="form-label">
            Tempat
          </label>
          {/* Input untuk nama fakultas dengan class bootstrap */}
          <input
            type="text" className="form-control" id="tempat_lahir"
            value={tempat_lahir} // Nilai input disimpan di state namaFakultas
            onChange={(e) => setTempat(e.target.value)} // Update state saat input berubah
            placeholder="Enter tempat_lahir Name" // Placeholder teks untuk input
          />
        </div>

        <div className="mb-3">
          <label className="form-label">
            Email
          </label>
          {/* Input untuk nama fakultas dengan class bootstrap */}
          <input
            type="text" className="form-control" id="email"
            value={email} // Nilai input disimpan di state namaFakultas
            onChange={(e) => setEmail(e.target.value)} // Update state saat input berubah
            placeholder="Enter Email Name" // Placeholder teks untuk input
          />
        </div>

        <div className="mb-3">
          <label className="form-label">
            HP
          </label>
          {/* Input untuk nama nama dekan dengan class bootstrap */}
          <input
            type="text" className="form-control" id="hp"
            value={hp} // Nilai input disimpan di state namaFakultas
            onChange={(e) => setHp(e.target.value)} // Update state saat input berubah
            placeholder="Enter HP Name" // Placeholder teks untuk input
          />
        </div>

        <div className="mb-3">
          <label className="form-label">
            Alamat
          </label>
          {/* Input untuk nama nama dekan dengan class bootstrap */}
          <input
            type="text" className="form-control" id="alamat"
            value={alamat} // Nilai input disimpan di state namaFakultas
            onChange={(e) => setAlamat(e.target.value)} // Update state saat input berubah
            placeholder="Enter Alamat Name" // Placeholder teks untuk input
          />
        </div>

        <div className="mb-3">
          <label className="form-label">
            Prodi
          </label>
          {/* Input untuk nama nama dekan dengan class bootstrap */}
          <input
            type="text" className="form-control" id="prodi"
            value={prodi} // Nilai input disimpan di state namaFakultas
            onChange={(e) => setProdi(e.target.value)} // Update state saat input berubah
            placeholder="Enter prodi Name" // Placeholder teks untuk input
          />
        </div>
        <button type="submit" className="btn btn-primary">
          Create
        </button>
      </form>
    </div>
  );
  }
