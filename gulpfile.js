
let project_folder = require("path");
let source_folder = "#src";

let fs = require('fs');

let path = {
	build: {
		html: './',
		css: "./css/",
		js: "./js/",
		img: "./img/",
		fonts: "./fonts/",
	},
	src: {
		html: "./",
		css: [source_folder + "/sass/*.scss", source_folder + "/sass/*.sass", "!" + source_folder + "/sass/_*.sass"],
		js: source_folder + "/js/*.js",
		img: source_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}",
		fonts: source_folder + "/fonts/*.ttf",
	},
	watch: {
		html: "./*.php",
		css: source_folder + "/sass/**/*.sass",
		js: source_folder + "/js/**/*.js",
		img: source_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}"
	},
	clean: "./" + project_folder + "/"
}

let { src, dest } = require('gulp'),
	gulp = require('gulp'),
	browsersync = require("browser-sync").create(),
	fileinclude = require("gulp-file-include"),
	del = import("del"),
	scss = require('gulp-sass')(require('sass')),
	autoprefixer = require("gulp-autoprefixer"),
	group_media = require("gulp-group-css-media-queries"),
	clean_css = require("gulp-clean-css"),
	rename = require("gulp-rename"),
	uglify = require("gulp-uglify-es").default,
	imagemin = require("gulp-imagemin"),
	ttf2woff = require('gulp-ttf2woff'),
	ttf2woff2 = require('gulp-ttf2woff2'),
	fonter = require('gulp-fonter'),
	newer = require('gulp-newer');

function browserSync(params) {
	browsersync.init({
		proxy: "http://lesen-ko-local.ru/",
		notify: false
	});
}
function html() {
	return src(path.src.html)
		//.pipe(fileinclude())
		.pipe(dest(path.build.html))
		.pipe(browsersync.stream()) 
}

function css() {
	return src(path.src.css)
		.pipe(
			scss({ outputStyle: 'expanded' }).on('error', scss.logError)
		)
		.pipe(
			group_media()
		)
		.pipe(
			autoprefixer({
				overrideBrowserslist: ["last 5 versions"],
				cascade: true
			})
		)
		.pipe(dest(path.build.css))
		.pipe(browsersync.stream())
		.pipe(clean_css())
		.pipe(
			rename({
				extname: ".min.css"
			})
		)
		.pipe(dest(path.build.css))
		
}
function js() {
	return src(path.src.js)
		.pipe(fileinclude())
		.pipe(dest(path.build.js))
		.pipe(
			uglify()
		)
		.on('error', function (err) { console.log(err.toString()); this.emit('end'); })
		.pipe(
			rename({
				extname: ".min.js"
			})
		)
		.pipe(dest(path.build.js))
		.pipe(browsersync.stream())
}
function images() {
	return src(path.src.img)
		.pipe(newer(path.build.img))
		.pipe(
			imagemin({
				progressive: true,
				svgoPlugins: [{ removeViewBox: false }],
				interlaced: true,
				optimizationLevel: 0 // 0 to 7
			})
		)
		.pipe(dest(path.build.img))
}
function fonts() {
	src(path.src.fonts)
		.pipe(ttf2woff())
		.pipe(dest(path.build.fonts));
	return src(path.src.fonts)
		.pipe(ttf2woff2())
		.pipe(dest(path.build.fonts));
};
function fonts_otf() {
	return src('./' + source_folder + '/fonts/*.otf')
		.pipe(fonter({
			formats: ['ttf']
		}))
		.pipe(gulp.dest('./' + source_folder + '/fonts/'));
}
function fontstyle() {
	let file_content = fs.readFileSync(source_folder + '/sass/reset/_fonts.sass');
	if (file_content == '') {
		fs.writeFile(source_folder + '/sass/reset/_fonts.sass', '', cb);
		fs.readdir(path.build.fonts, function (err, items) {
			if (items) {
				let c_fontname;
				for (var i = 0; i < items.length; i++) {
					let fontname = items[i].split('.');
					fontname = fontname[0];
					if (c_fontname != fontname) {
						fs.appendFile(source_folder + '/sass/reset/_fonts.sass', '@include font("' + fontname + '", "' + fontname + '", "400", "normal");\r\n', cb);
					}
					c_fontname = fontname;
				}
			}
		})
	}
	return src(path.src.html).pipe(browsersync.stream());
}
function cb() { }
function watchFiles(params) {
	gulp.watch([path.watch.html], html);
	gulp.watch([path.watch.css], css);
	gulp.watch([path.watch.js], js);
	gulp.watch([path.watch.img], images);
} 
function clean(params) {
	return del(path.clean);
}
let fontsBuild = gulp.series(fonts_otf, fonts, fontstyle);
let buildDev = gulp.series(gulp.parallel(fontsBuild, css, html, js, images));
let watch = gulp.series(buildDev, gulp.parallel(watchFiles, browserSync));

exports.fonts = fontsBuild;
exports.watch = watch;
exports.default = watch;