/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fractol.h                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/21 19:09:37 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/06 14:16:50 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FRACTOL_H

# define FRACTOL_H
# include "../libft/libft.h"
# include <fcntl.h>
# include <mlx.h>
# include <math.h>

# define W 13
# define S 1
# define A 0
# define D 2
# define PLUS 24
# define MINUS 27
# define LEFT_CLICK 1
# define RIGHT_CLICK 2
# define MOUSE_UP 5
# define MOUSE_DOWN 4
# define RESET 15
# define ONE 18
# define TWO 19
# define THREE 20
# define FOUR 21
# define FIVE 23
# define SIX 22
# define M 46
# define X 7
# define POINT 47
# define COMA 43

typedef struct		s_mlx
{
	void			*mlx_ptr;
	void			*win_ptr;
	void			*img_ptr;
	char			*img_str;
	int				size_line;
	int				width;
	int				height;
	int				bpp;
	int				endian;
}					t_mlx;

typedef struct		s_fra
{
	int				i;
	int				x;
	int				y;
	int				max_iter; // control zoom
	double			x1; // x-min
	double			x2; // x-max
	double			y1; // y-min
	double			y2;	// y-max
	double			mx; // moving x
	double			my; // moving y
	double			c_i;
	double			c_r;
	double			z_i;
	double			z_r;
	double			tmp;
}					t_fra;

typedef struct		s_key
{
	int				fractal;
	int				color_r; // display color red
	int				color_b; // display color blue
	int				color_g; // display color green
	int				color_bonus;
	int				mouse;
	int				click;
	double			px; // position of x
	double			py; // position of y
	double			zoom;
}					t_key;

typedef struct		s_all
{
	t_mlx			mlx;
	t_fra			fra;
	t_key			key;
}					t_all;

int					ft_check_fractals(char *str, t_all *all);
int					ft_create_window(t_all *all);
int					ft_keycode(int key, t_all *all);
int					ft_keycode2(int key, t_all *all);
int					ft_rgb_color(t_all *all);
void				ft_array(t_all *all);
void				ft_redraw(t_all *all);
void				ft_init_keycode(t_all *all);
void				ft_choose_fractal(t_all *all);
void				ft_init_fractal(t_all *all);
void				ft_init_julia(t_all *all);
int					ft_julia(t_all *all);
void				ft_init_mandelbrot(t_all *all);
int					ft_mandelbrot(t_all *all);
void				ft_init_burning_ship(t_all *all);
int					ft_burning_ship(t_all *all);
int					ft_mousehook(int button, int x, int y, t_all *all);
int					ft_motion_hook(int x, int y, t_all *all);
void				mlx_pixel_put_to_image(t_all *all, int x, int y, int color);

#endif
