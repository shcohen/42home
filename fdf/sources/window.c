/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   window.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:33 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/10 19:49:45 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     ft_create_window(t_all *all)
{
	int		x;
	int		y;
	int		ex;
	int		ey;

	x = 0;
	y = 0;
	ex = 100;
	ey = 100;
	all->win.mlx_ptr = mlx_init();
	all->win.win_ptr = mlx_new_window(all->win.mlx_ptr, 500, 500, "fdf");
	while (y < all->map.height)
	{
		while (x < all->map.width)
		{
			all->bres.x1 = x * ey;
			all->bres.y1 = y * ey;
			all->bres.x2 = (x + 1) * ey;
			all->bres.y2 = (y + 1) * ey;
			ft_bresenham(all);
			mlx_pixel_put(all->win.mlx_ptr, all->win.win_ptr, (x + ex), (y + ey), 0xFFFFFF);
			x++;
			ex += 10;
		}
		x = 0;
		ex = 100;
		y++;
		ey += 10;
	}
	mlx_loop(all->win.mlx_ptr);
    return (0);
}