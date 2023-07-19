import React, {Fragment, useState}      from 'react';
import ReactDOM                         from 'react-dom';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import ReactTooltip                     from 'react-tooltip';
// Components
import Home                 from "./index/Home"
import Nomatch              from "./index/Nomatch"
import Navbar               from "./navbar/Navbar"
import CategoriesList       from "./blog/categories/categories-list"
import CategoriesForm       from "./blog/categories/categories-form"
import ArticlesList         from "./blog/articles/articles-list"
import ArticlesForm         from "./blog/articles/articles-form"
import VideosList           from "./galleries/videos/videos-list"
import VideosForm           from "./galleries/videos/videos-form"
import GalleriesList        from "./galleries/galleries/galleries-list"
import GalleriesForm        from "./galleries/galleries/galleries-form"
import Load8 from "./commons/load8";

const Cms = () => {
    const [loading, setLoading]         = useState(true)
    const [isCollapsed, setIsCollapsed] = useState(false)

    const handleClick = () => {
        setIsCollapsed( !isCollapsed )
    }

    let isCollapsedNavClass = isCollapsed
        ? 'nav-collapsed'
        : 'col-md-2 mb-3 open'
    let isCollapsedClass = isCollapsed
        ? 'col-12'
        : 'col-md-10'

    return(
        <div className="row no-gutters">
            <BrowserRouter>
                <div className="col-md-2">
                    <button className="btn btn-sm btn-outline-info"
                            onClick={handleClick}
                    >
                        {
                            isCollapsed
                                ? <Fragment>
                                    <i className="bi bi-arrow-bar-right"/> Mostrar menú
                                </Fragment>
                                : <Fragment>
                                    <i className="bi bi-arrow-bar-left"/> Ocultar menú
                                </Fragment>
                        }
                    </button>
                </div>
                <div className="col-12">&nbsp;</div>
                <Navbar isCollapsedClass={isCollapsedNavClass} />
                <main className={`p-2 ${isCollapsedClass}`}>
                    <Routes>
                        <Route path="/cms" element={<Home setLoading={setLoading} />} />

                        <Route path="/cms/categorias" element={<CategoriesList setLoading={setLoading} /> }/>
                        <Route path="/cms/categorias/create" element={<CategoriesForm setLoading={setLoading} />} />
                        <Route path="/cms/categorias/:id/update" element={<CategoriesForm setLoading={setLoading} do="edit" />} />

                        <Route path="/cms/articulos" element={<ArticlesList setLoading={setLoading}/>} />
                        <Route path="/cms/articulos/create" element={<ArticlesForm setLoading={setLoading}/>} />
                        <Route path="/cms/articulos/:id/update" element={<ArticlesForm setLoading={setLoading} do="edit"/>} />

                        <Route path="/cms/videos" element={<VideosList setLoading={setLoading}/>} />
                        <Route path="/cms/videos/create" element={<VideosForm setLoading={setLoading}/>} />
                        <Route path="/cms/videos/:id/update" element={<VideosForm setLoading={setLoading} do="edit"/>} />

                        <Route path="/cms/galerias" element={<GalleriesList setLoading={setLoading}/>} />
                        <Route path="/cms/galerias/create" element={<GalleriesForm setLoading={setLoading}/>} />
                        <Route path="/cms/galerias/:id/update" element={<GalleriesForm setLoading={setLoading} do="edit"/>} />

                        <Route path="*" element={<Nomatch setLoading={setLoading}/>}/> } />
                    </Routes>
                </main>
            </BrowserRouter>

            <Load8 isVisible={loading}/>
            <ReactTooltip type="dark" />
        </div>
    )
}

export default Cms;


if( document.getElementById('main') )
{
    ReactDOM.render(<Cms />, document.getElementById('main'));
}
