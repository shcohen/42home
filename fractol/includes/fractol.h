/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fractol.h                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/21 19:09:37 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/03 23:35:56 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

# ifndef FRACTOL_H

#define FRACTOL_H
# include "../libft/libft.h"
# include <fcntl.h>
# include <mlx.h>
# include <math.h>

typedef struct		s_mlx
{
	void			*mlx_ptr;
	void			*win_ptr;
	void			*img_ptr;
	int				*img_str;
	int				width;
	int				height;
	int				max_iter;
	int				size_line;
	int				x_size;
	int				y_size;
	int				bpp; // ??
	int				s_l; // ??
	int				endian; // ??
}					t_mlx;

typedef struct		s_fra
{
	double			x1; // x-min
	double			x2; // x-max
	double			y1; // y-min
	double			y2;	// y-max
	double			mx; // moving x
	double			my; // moving y
}					t_fra;

typedef struct		s_key
{
	int				fractal;
	int				color_r; // display color red
	int				color_b; // display color blue
	int				color_g; // display color green
}					t_key;

typedef struct		s_all
{
	t_mlx			mlx;
	t_fra			fra;
	t_key			key;
}					t_all;

int					ft_check_fractal(char *str, t_all *all);
int					ft_create_window(t_all *all);
int					ft_color_choice(t_all *all);
int					ft_usage(void);
int					ft_key(int key, t_all *all);
void				ft_keycode(int key, t_all *all);
void				ft_array(t_all *all);

#endif
