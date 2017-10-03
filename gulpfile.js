"use strict";
/*eslint-disable*/


var gulp = require("gulp"),
    babel = require("gulp-babel"),
    stylus = require("gulp-stylus"),
    livereload = require("gulp-livereload");


var config = {
        rawPath: {
            js: "res/babel/**/*.js",
            jsx: "res/jsx/**/*.jsx",
            stylus: "res/precss/**/*.styl"
        },
        distPath: {
            js: "res/js",
            jsx: "res/js/react",
            stylus: "res/css"
        }
    },
    changedFile = "";


gulp.task("js", function() {
    // var babelPresets = ["es2015", "env", "babili"];
    var babelPresets = ["env"];

    var babelCompiler = babel({
        presets: babelPresets
    });

    babelCompiler.on("error", function(e) {
        console.log(e);
        babelCompiler.end();
    });

    var file = config.rawPath.js,
        dest = config.distPath.js;

    if (changedFile !== "") {
        file = changedFile;
        dest = parsePath(file).replace("babel", "js");
        changedFile = "";
    }

    return gulp.src(file)
        .pipe(babelCompiler)
        .pipe(gulp.dest(dest))
        .pipe(livereload());
});


gulp.task("jsx", function() {
    var babelPresets = ["env", "react"];

    var babelCompiler = babel({
        presets: babelPresets
    });

    babelCompiler.on("error", function(e) {
        console.log(e);
        babelCompiler.end();
    });

    var file = config.rawPath.jsx,
        dest = config.distPath.jsx;

    if (changedFile !== "") {
        file = changedFile;
        dest = parsePath(file).replace("jsx", "js/react");
        changedFile = "";
    }

    return gulp.src(file)
        .pipe(babelCompiler)
        .pipe(gulp.dest(dest))
        .pipe(livereload());
});


gulp.task("stylus", function() {
    var stylusCompiler = stylus({
        compress: true
    });

    stylusCompiler.on("error", function(e) {
        console.log(e);
        stylusCompiler.end();
    });

    var file = config.rawPath.stylus,
        dest = config.distPath.stylus;

    if (changedFile !== "") {
        file = changedFile;
        dest = parsePath(file).replace("precss", "css");
        changedFile = "";
    }

    return gulp.src(file)
        .pipe(stylusCompiler)
        .pipe(gulp.dest(dest))
        .pipe(livereload());
});


gulp.task("watch", function() {
    livereload.listen({
        port: 35729,
        quiet: true
    });

    gulp.watch(config.rawPath.js)
        .on("change", function(file) {
            console.log("File: " + file.path);
            changedFile = file.path;
            gulp.start("js");
        })
        .on("unlink", function(file) {
            console.log("File removed: " + file.path);
        })
        .on("add", function(file) {
            console.log("File added: " + file.path);
        });


    gulp.watch(config.rawPath.jsx)
        .on("change", function(file) {
            console.log("File: " + file.path);
            changedFile = file.path;
            gulp.start("jsx");
        });


    gulp.watch(config.rawPath.stylus)
        .on("change", function(file) {
            console.log("File: " + file.path);
            changedFile = file.path;
            gulp.start("stylus");
        })
        .on("unlink", function(file) {
            console.log("File removed: " + file.path);
        })
        .on("add", function(file) {
            console.log("File added: " + file.path);
        });

});


gulp.task("default", ["js", "jsx", "stylus", "watch"]);



function parsePath(file) {
    var filePath = file.substr(file.indexOf("res")),
        itemName = file.substr(file.lastIndexOf("\\"), file.length),
        dest = filePath;

    // dest = dest.substr(dest.indexOf("\\") + 1, dest.length);
    dest = dest.replace(itemName, "");

    return dest;
}
