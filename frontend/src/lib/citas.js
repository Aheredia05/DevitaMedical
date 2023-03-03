import axios from "axios";

export const deleteCita = async (id) => {

  const token = localStorage.getItem("token");

  try {
    return await axios.delete(`http://localhost:8000/api/v1/cita/${id}`, {
      headers: { accept: "application/json", authorization: token },
    });
  } catch (error) {
    console.log(error);
  }
};
