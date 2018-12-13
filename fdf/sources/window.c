/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   window.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:33 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/13 19:43:21 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

void		ft_display(t_all *all)
{
	int	x;
	int	y;

	y = 0;
	while (y < all->map.height)
	{
		x = 0;
		while (x < all->map.width)
		{
			all->bres.xi = ((x - y) + (all->map.height / 2 - all->map.width / 2)) 
				* all->win.ex + (all->win.width / 2) + all->win.rl;
			all->bres.yi = ((x + y) - (all->map.height / 2 + all->map.width / 2)) 
				* all->win.ey + (all->win.height / 2) - all->map.tab[y][x] * all->win.ez + all->win.ud;
			if (x < all->map.width - 1)
			{
				all->bres.xf = (((x + 1) - y) + (all->map.height / 2 - all->map.width / 2)) 
					* all->win.ex + all->win.width / 2 + all->win.rl;
				all->bres.yf = (((x + 1) + y) - (all->map.height / 2 + all->map.width / 2)) 
					* all->win.ey + all->win.height / 2 - all->map.tab[y][x + 1] * all->win.ez + all->win.ud;
				ft_bresenham(all, all->map.tab[y][x]);
			}
			if (y < all->map.height - 1)
			{
				all->bres.xf = ((x - (y + 1)) + (all->map.height / 2 - all->map.width / 2)) 
					* all->win.ex + all->win.width / 2 + all->win.rl;
				all->bres.yf = ((x + (y + 1)) - (all->map.height / 2 + all->map.width / 2)) 
					* all->win.ey + all->win.height / 2 - all->map.tab[y + 1][x] * all->win.ez + all->win.ud;
				ft_bresenham(all, all->map.tab[y][x]);
			}
			x++;
		}
		y++;
	}
}

int     ft_create_window(t_all *all)
{
	int	bpp;
	int	s_l;
	int	endian;

	all->win.height = 1080;
	all->win.width = 1920;
	all->win.ex = all->win.width / (all->map.width + all->map.height) / 2 * 1.732; // isometric projection
	all->win.ey = all->win.width / (all->map.width + all->map.height) / 2;
	all->win.ez = all->win.width / (all->map.height + all->map.width) / 5;
	all->win.ud = 0;
	all->win.rl = 0;
	all->win.color_choice = 0;
	all->win.mlx_ptr = mlx_init();
	all->win.win_ptr = mlx_new_window(all->win.mlx_ptr, all->win.width, all->win.height, "fdf");
	all->win.img_ptr = mlx_new_image(all->win.mlx_ptr, all->win.width, all->win.height);
	all->win.img_str = (int *)mlx_get_data_addr(all->win.img_ptr, &bpp, &s_l, &endian);
	ft_bzero(all->win.img_str, all->win.height * all->win.width * sizeof(int));
	ft_display(all);
	mlx_put_image_to_window(all->win.mlx_ptr, all->win.win_ptr, all->win.img_ptr, 0, 0);
    return (0);
}