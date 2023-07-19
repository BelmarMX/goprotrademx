import React         from 'react'
import {NavLink}    from "react-router-dom"

const Navbar = (props) => {
     return (
         <aside className={`p-2 ${props.isCollapsedClass}`}>
             <ul id="aside__menu">
                 <li className="aside__link">
                     <NavLink to="/cms">
                         <i className="bi bi-columns"/> Home
                     </NavLink>
                 </li>
                 <li className="aside__division"/>

                 <li className="aside__title">Artículos</li>
                 <li className="aside__link">
                     <NavLink to="/cms/categorias">
                         <i className="bi bi-tag-fill"/> Categorías
                     </NavLink>
                 </li>
                 <li className="aside__link">
                     <NavLink to="/cms/articulos">
                         <i className="bi bi-file-earmark-medical-fill"/> Artículos
                     </NavLink>
                 </li>
                 <li className="aside__division"/>

                 <li className="aside__title">Multimedia</li>
                 <li className="aside__link">
                     <a href="/cms/galerias/1/update">
                         <i className="bi bi-images"/> Banner
                     </a>
                 </li>
                 <li className="aside__link">
                     <NavLink to="/cms/galerias">
                         <i className="bi bi-images"/> Galería para blog
                     </NavLink>
                 </li>
                 <li className="aside__link">
                     <NavLink to="/cms/videos">
                         <i className="bi bi-file-play-fill"/> Videos
                     </NavLink>
                 </li>
                 <li className="aside__division"/>
             </ul>
         </aside>
     )
}

export default Navbar;
