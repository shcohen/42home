/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fdf.h                                              :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/27 15:37:46 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/19 17:57:32 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FDF_H

# define FDF_H
# include "../libft/libft.h"
# include <fcntl.h>
# include <mlx.h>
# include <math.h>

typedef struct		s_map
{
	int				**tab;
	int				width;
	int				height;
}					t_map;

typedef struct		s_win
{
	void			*mlx_ptr;
	void			*win_ptr;
	void			*img_ptr;
	int				*img_str;
	int				width;
	int				height;
	double			ey; // space between yi and yf
	double			ex; // space betweem xi and xf
	double			ez; // altitude and zoom
	int				ud; // up-down in y
	int				rl; // right-left in x
	int				color_choice; // dispay colors
	char			proj; // display wanted projection
}					t_win;

typedef struct		s_bres
{
	int				i;
	int				x;
	int				y;
	int				xinc;
	int				yinc;
	int				cumul;
	double			xi;
	double			xf;
	double			yi;
	double			yf;
	double			dx;
	double			dy;
}					t_bres;

typedef struct		s_all
{
	t_map			map;
	t_win			win;
	t_bres			bres;
}					t_all;

void				ft_bresenham(t_all *all, int z);
void				ft_bres1(t_all *all, int z);
void				ft_bres2(t_all *all, int z);
void				ft_iso(t_all *all);
void				ft_iso_x(t_all *all, int x, int y);
void				ft_iso_y(t_all *all, int x, int y);

void				ft_para(t_all *all);
void				ft_para1(t_all *all, int x, int y, int z);
// void				ft_para_x(t_all *all, int x, int y);
// void				ft_para_y(t_all *all, int x, int y);

void				ft_array(t_all *all);
void				ft_fill_pixel(t_all *all, int color);
int					ft_create_window(t_all *all);
int					ft_colors(t_all *all, int z);
int					ft_check(char *line);
int					ft_key(int key, t_all *all);
int					ft_key1(int key, t_all *all);
int					ft_key2(int key, t_all *all);
int					ft_key3(int key, t_all *all);
int					*ft_intsplit(char *str, char c);
t_all				*ft_parse_map(char *file, t_all *all);

#endif