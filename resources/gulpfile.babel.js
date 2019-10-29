import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import browserSync from 'browser-sync';
import globParent from 'glob-parent';
import sassGlob from 'gulp-sass-glob';
import path from 'path';

const server = browserSync.create();
const PRODUCTION = yargs.argv.prod;

const themeName = path.basename(globParent(__dirname));

const paths = {
	styles: {
		src: ['assets/style/bundle.scss', 'assets/style/login.scss'],
		dest: '../dist/style'
	},
	images: {
		src: 'assets/images/**/*.{jpg,jpeg,png,svg,gif}',
		dest: '../dist/images'
	},
	scripts: {
		src: 'assets/scripts/bundle.js',
		dest: '../dist/script'
	},
	fonts: {
		src: ['assets/fonts/**/*'],
		dest: '../dist/fonts'
	},
}

export const serve = (done) => {
	server.init({
		proxy: "http://localhost/" + themeName + ""
	});
	done();
}

export const reload = (done) => {
	server.reload();
	done();
}

export const clean = () => {
	return del(['dist']);
}

export const styles = (done) => {
	return gulp.src(paths.styles.src)
		.pipe(gulpif(!PRODUCTION, sourcemaps.init()))
		.pipe(sassGlob())
		.pipe(sass().on('error', sass.logError))
		.pipe(gulpif(PRODUCTION, cleanCss({ compatibility: 'ie8' })))
		.pipe(gulpif(!PRODUCTION, sourcemaps.write()))
		.pipe(gulp.dest(paths.styles.dest))
		.pipe(server.stream());
}

export const images = () => {
	return gulp.src(paths.images.src)
		.pipe(gulp.dest(paths.images.dest));
}

export const watch = () => {
	gulp.watch('assets/style/**/*.scss', styles);
	gulp.watch('assets/scripts/**/*.js', gulp.series(scripts, reload));
	gulp.watch('../**/*.php', reload);
	gulp.watch(paths.images.src, gulp.series(images, reload));
	gulp.watch(paths.fonts.src, gulp.series(copy, reload));
}

export const copy = () => {
	return gulp.src(paths.fonts.src)
		.pipe(gulp.dest(paths.fonts.dest));
}

export const scripts = () => {
	return gulp.src(paths.scripts.src)
		.pipe(webpack({
			module: {
				rules: [
					{
						test: /\.js$/,
						use: {
							loader: 'babel-loader',
							options: {
								presets: ['@babel/preset-env']
							}
						}
					}
				]
			},
			output: {
				filename: 'bundle.js'
			},
			devtool: !PRODUCTION ? 'inline-source-map' : false
		}))
		.pipe(gulpif(PRODUCTION, uglify()))
		.pipe(gulp.dest(paths.scripts.dest));
}

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));

export default dev;