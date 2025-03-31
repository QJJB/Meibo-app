"use client"

import { useEffect, useState } from "react";

export default function Projects() {
  const [projects, setProjects] = useState([]);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/projects") // Mets l'URL de ton backend
      .then((res) => res.json())
      .then((data) => setProjects(data))
      .catch((err) => console.error("Erreur:", err));
  }, []);

  return (
    <div>
      <h1>Liste des Projets</h1>
      <ul>
        {projects.map((project) => (
          <li key={project.id}>{project.name}</li>
        ))}
      </ul>
    </div>
  );
}